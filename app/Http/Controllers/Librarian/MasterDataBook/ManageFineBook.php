<?php

namespace App\Http\Controllers\Librarian\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Fine;
use Illuminate\Http\Request;

class ManageFineBook extends Controller
{
    public function show_data_denda()
    {
        $booksWithoutFines = Book::where('format', 'Fisik')->doesntHave('fine')->get();

        return view('librarian-pages.master-data.book-management.fine.index', [
            'title' => 'Data Denda Buku',
            'heading' => 'Denda Buku',
            'fines' => Fine::with('book')->get(),
            'without_fines' => $booksWithoutFines
        ]);
    }
}
