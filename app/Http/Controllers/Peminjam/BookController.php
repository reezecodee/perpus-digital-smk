<?php

namespace App\Http\Controllers\Peminjam;

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
        return view('peminjam_views.buku.detail_buku', [
            'title' => 'Detail Buku',
            'data' => Book::find($id),
            'likes' => count(LikedBook::where('buku_id', $id)->get()),
            'reviews' => Review::where('buku_id', $id)->get(),
            'rating' => number_format((float)Review::where('buku_id', $id)->avg('rating'), 1, '.', '')
        ]);
    }
    public function show_confirm($id)
    {
        return view('peminjam_views.buku.konfirmasi_peminjaman', [
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
        $books = Borrower::where('peminjam_id', auth()->user()->id)->where(
            'status',
            '!=',
            'Sudah dikembalikan'
        )->whereHas('book', function ($query) {
            $query->where('format', 'Fisik');
        })->with('book')->get();

        $e_books = Borrower::where('peminjam_id', auth()->user()->id)
            ->whereHas('book', function ($query) {
                $query->where('format', 'Elektronik');
            })->with('book')->get();

        $for_reviews = Borrower::where('peminjam_id', auth()->user()->id)->where('status', 'Sudah dikembalikan')->get();

        return view('peminjam_views.rak_buku', [
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
        return view('peminjam_views.buku.baca_e_book', [
            'title' => 'Baca E-Book',
        ]);
    }

    public function show_detail_rent($id)
    {
        return view('peminjam_views.detail_peminjaman', [
            'title' => 'Detail Peminjaman',
            'data' => Borrower::find($id),
            'barcode' => function ($data, $widthFactor = 2, $height = 30) {
                return $this->get_barcode($data, $widthFactor, $height);
            }
        ]);
    }

    public function show_liked_book()
    {
        return view('peminjam_views.buku_disukai', [
            'title' => 'Buku yang Anda Sukai',
            'liked_books' => LikedBook::where('peminjam_id', auth()->user()->id)->get()
        ]);
    }

    public function show_all_books()
    {
        return view('peminjam_views.buku.semua_buku', [
            'title' => 'Semua Buku Perpustakaan'
        ]);
    }

    public function show_search_result()
    {
        return view('peminjam_views.hasil_pencarian', [
            'title' => 'Hasil Pencarian Buku'
        ]);
    }

    private function get_barcode($data, $widthFactor = 2, $height = 30)
    {
        $generatorHTML = new BarcodeGeneratorHTML();
        return $generatorHTML->getBarcode("$data", $generatorHTML::TYPE_CODE_128, $widthFactor, $height);
    }
}
