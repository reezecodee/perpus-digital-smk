<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchResult extends Controller
{
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
}
