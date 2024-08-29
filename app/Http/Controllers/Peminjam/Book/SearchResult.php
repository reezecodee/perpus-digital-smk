<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class SearchResult extends Controller
{
    public function show_search_result(Request $request)
    {
        $query = $request->query('q', ''); 

        $booksQuery = Book::available()
            ->join('categories', 'books.kategori_id', '=', 'categories.id')
            ->select('books.*') 
            ->with('category') 
            ->withAvg('review', 'rating') 
            ->latest(); 

        if ($query) {
            $booksQuery->where(function ($q) use ($query) {
                $q->where('books.judul', 'like', '%' . $query . '%')
                    ->orWhere('categories.nama_kategori', 'like', '%' . $query . '%')
                    ->orWhere('books.format', 'like', '%' . $query . '%'); 
            });
        }

        $books = $request->has('_token') ? $booksQuery->paginate(10) : $booksQuery->limit(12)->get();

        return view('peminjam_views.buku.hasil-pencarian', [
            'title' => 'Hasil Pencarian Buku',
            'books' => $books
        ]);
    }
}
