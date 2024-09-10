<?php

namespace App\Http\Controllers\Borrower\ReadEbook;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadEbookController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman untuk membaca E-book.
     * @param $id -> ID E-book
     */

    public function showReadEbook($id)
    {
        $book = Book::findOrFail($id);
        $title = "Baca E-book {$book->judul}";

        return view('borrower-pages.book.read-ebook', compact('title', 'book'));
    }
}
