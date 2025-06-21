<?php

namespace App\Http\Controllers\Student\ReadEbook;

use App\Http\Controllers\Controller;
use App\Models\Book;

class ReadEbookController extends Controller
{
    public function showReadEbook($id)
    {
        $book = Book::findOrFail($id);
        $title = "Baca E-book {$book->judul}";

        return view('student-pages.book.read-ebook', compact('title', 'book'));
    }
}
