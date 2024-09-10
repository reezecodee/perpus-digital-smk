<?php

namespace App\Http\Controllers\Borrower\AllBooks;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllBooksController extends Controller
{
    /**
     * Function digunakan untuk menampilkan halaman semua buku perpustakaan.
     * 
     */
    public function showAllBooksPage(Request $request)
    {
        $format = $request->query('format');
        $filter = $request->query('filter');
        $query = $request->query('s') ?? '';

        // ambil data buku
        $booksQuery = Book::with('category')
            ->where('format', $format)
            ->withAvg('review', 'rating')
            ->addSelect([
                'total_books_available' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
            ->latest();

        if ($request->missing('_token')) {
            return $this->renderBooksPage($booksQuery->get(), $format);
        }

        if (!empty($query)) {
            $booksQuery->where('judul', 'like', '%' . $query . '%');
        }

        $this->applyFilter($booksQuery, $filter);

        return $this->renderBooksPage($booksQuery->get(), $format);
    }


    /**
     * Filter kategori yang di izinkan.
     */
    private function applyFilter($booksQuery, $filter)
    {
        switch ($filter) {
            case 'judul':
                $booksQuery->orderBy('judul', 'asc');
                break;
            case 'terbaru':
                $booksQuery->orderBy('created_at', 'desc');
                break;
            case 'terdahulu':
                $booksQuery->orderBy('created_at', 'asc');
                break;
        }
    }

    /**
     * Lakukan render halaman tersebut.
     */
    private function renderBooksPage($books, $format)
    {
        $title = 'Semua Buku Yang Ada di Perpustakaan';
        $books = $books;
        $format = $format;

        return view('borrower-pages.book.all-books', compact('title', 'books', 'format'));
    }
}
