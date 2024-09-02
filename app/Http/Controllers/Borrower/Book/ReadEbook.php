<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadEbook extends Controller
{
    public function show_read_e_book($id)
    {
        return view('borrower-pages.book.read-ebook', [
            'title' => 'Baca E-Book',
            'book' => Book::find($id),
        ]);
    }
}
