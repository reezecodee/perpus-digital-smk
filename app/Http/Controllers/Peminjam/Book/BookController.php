<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\LikedBook;
use App\Models\Review;
use Illuminate\Http\Request;
use Picqer\Barcode\BarcodeGeneratorHTML;

class BookController extends Controller
{
    public function show_book($id)
    {
        $data = Book::find($id);

        if(!$data){
            return abort(404);
        }

        $is_liked = LikedBook::where('peminjam_id', auth()->user()->id)->where('buku_id', $id)->exists();

        $recomendations = Book::where('format', $data->format)->where('status', 'Tersedia')->where('id', '!=', $id)->with('category')->limit(12)->latest()->get();

        return view('peminjam_views.buku.detail-buku', [
            'title' => 'Detail Buku',
            'data' => $data,
            'likes' => count(LikedBook::where('buku_id', $id)->get()),
            'reviews' => Review::where('buku_id', $id)->get(),
            'rating' => number_format((float)Review::where('buku_id', $id)->avg('rating'), 1, '.', ''),
            'is_liked' => $is_liked,
            'recomendations' => $recomendations
        ]);
    }
    public function show_confirm($id)
    {
        $book = Book::with('fine')->find($id);
        if($book->format == 'Elektronik'){
            return back();
        }

        return view('peminjam_views.buku.konfirmasi-peminjaman', [
            'title' => 'Konfirmasi Peminjaman',
            'data' => Book::with('fine')->find($id),
        ]);
    }

    public function show_success()
    {
        return view('peminjam_views.buku.sukses', [
            'title' => 'Peminjaman Sukses'
        ]);
    }

    public function show_my_shelf()
    {
        $excluded_statuses = ['Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'];
        $books = Borrower::where('peminjam_id', auth()->user()->id)
        ->whereNotIn('status', $excluded_statuses)
        ->whereHas('book', function ($query) {
            $query->where('format', 'Fisik');
        })->with('book')->get();

        $e_books = Borrower::where('peminjam_id', auth()->user()->id)
            ->whereHas('book', function ($query) {
                $query->where('format', 'Elektronik');
            })->with('book')->get();

        $for_reviews = Borrower::where('peminjam_id', auth()->user()->id)->where('status', 'Sudah dikembalikan')->get();

        return view('peminjam_views.buku.rak-buku', [
            'title' => 'Rak Buku Saya',
            'books' => $books,
            'e_books' => $e_books,
            'for_reviews' => $for_reviews,
            'reviews' => Review::where('peminjam_id', auth()->user()->id)->get(),
            'barcode' => function ($data, $widthFactor = 2, $height = 30) {
                return $this->get_barcode($data, $widthFactor, $height);
            },
        ]);
    }

    public function show_read_e_book($id)
    {
        return view('peminjam_views.buku.baca-e-book', [
            'title' => 'Baca E-Book',
            'book' => Book::find($id),
        ]);
    }

    public function show_detail_rent($id)
    {
        $borrower = Borrower::find($id);

        if(!$borrower || $borrower->status == 'E-book'){
            abort(404);
        }

        return view('peminjam_views.buku.detail-peminjaman', [
            'title' => 'Detail Peminjaman',
            'data' => $borrower,
            'barcode' => function ($data, $widthFactor = 2, $height = 30) {
                return $this->get_barcode($data, $widthFactor, $height);
            }
        ]);
    }

    public function show_liked_book()
    {
        return view('peminjam_views.buku.buku-disukai', [
            'title' => 'Buku yang Anda Sukai',
            'liked_books' => LikedBook::where('peminjam_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function show_all_books(Request $request)
    {
        $format = $request->query('format');
        $filter = $request->query('filter');
        $query = $request->query('q') ?? '';

        $booksQuery = Book::where('format', $format);

        if (!$request->has('_token')) {
            return view('peminjam_views.buku.semua-buku', [
                'title' => 'Semua Buku Perpustakaan',
                'books' => $booksQuery->paginate(10),
                'format' => $format
            ]);
        }

        $booksQuery = Book::where('format', $format);

        if (!empty($query)) {
            $booksQuery->where('judul', 'like', '%' . $query . '%');
        }

        if ($filter == 'judul') {
            $booksQuery->orderBy('judul', 'asc');
        } elseif ($filter == 'terbaru') {
            $booksQuery->orderBy('created_at', 'desc');
        } elseif ($filter == 'terdahulu') {
            $booksQuery->orderBy('created_at', 'asc');
        }

        $get_books = $booksQuery->paginate(10);

        return view('peminjam_views.buku.semua-buku', [
            'title' => 'Semua Buku Perpustakaan',
            'books' => $get_books,
            'format' => $format
        ]);
    }

    public function show_search_result(Request $request)
    {
        $query = $request->query('q') ?? '';

        $booksQuery = Book::query()
        ->join('categories', 'books.kategori_id', '=', 'categories.id')
        ->select('books.*');

        if (!empty($query)) {
            $booksQuery->where(function ($q) use ($query) {
                $q->where('books.judul', 'like', '%' . $query . '%')
                  ->orWhere('categories.nama_kategori', 'like', '%' . $query . '%');
            });

            $booksQuery->orWhere('books.format', 'like', '%' . $query . '%');
        }

        if (!$request->has('_token')) {
            return view('peminjam_views.buku.hasil-pencarian', [
                'title' => 'Hasil Pencarian Buku',
                'books' => $booksQuery->get() 
            ]);
        }

        return view('peminjam_views.buku.hasil-pencarian', [
            'title' => 'Hasil Pencarian Buku',
            'books' => $booksQuery->paginate(10)
        ]);
    }

    private function get_barcode($data, $widthFactor = 2, $height = 30)
    {
        $generatorHTML = new BarcodeGeneratorHTML();
        return $generatorHTML->getBarcode("$data", $generatorHTML::TYPE_CODE_128, $widthFactor, $height);
    }
}
