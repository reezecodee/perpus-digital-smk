<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllBooks extends Controller
{
    public function show_all_books(Request $request)
    {
        $format = $request->query('format');
        $filter = $request->query('filter');
        $query = $request->query('s') ?? '';

        $booksQuery = Book::with('category')->where('format', $format)
            ->withAvg('review', 'rating')
            ->addSelect([
                'total_books_available' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
            ->latest();

        if (!$request->has('_token')) {
            return view('borrower-pages.book.all-books', [
                'title' => 'Semua Buku Perpustakaan',
                'books' => $booksQuery->get(),
                'format' => $format
            ]);
        }

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

        $get_books = $booksQuery->get();

        return view('borrower-pages.book.all-books', [
            'title' => 'Semua Buku Perpustakaan',
            'books' => $get_books,
            'format' => $format
        ]);
    }
}
