<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class AllBooks extends Controller
{
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
}
