<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            ->addSelect([
                'total_books_available' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
            ->latest(); 

        if ($query) {
            $booksQuery->where(function ($q) use ($query) {
                $q->where('books.judul', 'like', '%' . $query . '%')
                    ->orWhere('categories.nama_kategori', 'like', '%' . $query . '%')
                    ->orWhere('books.format', 'like', '%' . $query . '%'); 
            });
        }

        $books = $request->has('_token') ? $booksQuery->paginate(10) : $booksQuery->limit(12)->get();

        return view('borrower-pages.book.search-result', [
            'title' => 'Hasil Pencarian Buku',
            'books' => $books
        ]);
    }
}
