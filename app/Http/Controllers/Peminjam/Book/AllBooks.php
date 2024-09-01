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
        $query = $request->query('s') ?? '';

        $booksQuery = Book::with('category')->where('format', $format)
            ->withAvg('review', 'rating')
            ->latest();

        if (!$request->has('_token')) {
            return view('peminjam_views.buku.semua-buku', [
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

        return view('peminjam_views.buku.semua-buku', [
            'title' => 'Semua Buku Perpustakaan',
            'books' => $get_books,
            'format' => $format
        ]);
    }
}
