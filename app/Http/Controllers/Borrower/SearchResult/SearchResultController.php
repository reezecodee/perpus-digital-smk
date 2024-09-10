<?php

namespace App\Http\Controllers\Borrower\SearchResult;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchResultController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman hasil pencarian.
     * 
     */

    public function showSearchResult(Request $request)
    {
        $query = $request->query('q', '');
        $booksQuery = $this->buildBooksQuery($query);
        $books = $this->getBooksResult($request, $booksQuery);
        $title = "Hasil Pencarian Buku \"$query\"";

        return view('borrower-pages.book.search-result', compact('title', 'books'));
    }
    

    /**
     * Membangun query untuk mencari buku.
     */

    private function buildBooksQuery($query)
    {
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

        if (!empty($query)) {
            $this->applySearchFilter($booksQuery, $query);
        }

        return $booksQuery;
    }


    /**
     * Menerapkan filter pencarian ke query buku.
     */

    private function applySearchFilter($booksQuery, $query)
    {
        $booksQuery->where(function ($q) use ($query) {
            $q->where('books.judul', 'like', '%' . $query . '%')
                ->orWhere('categories.nama_kategori', 'like', '%' . $query . '%')
                ->orWhere('books.format', 'like', '%' . $query . '%');
        });
    }


    /**
     * Mengambil hasil buku berdasarkan request.
     */

    private function getBooksResult(Request $request, $booksQuery)
    {
        return $request->has('_token')
            ? $booksQuery->paginate(10)
            : $booksQuery->limit(12)->get();
    }
}
