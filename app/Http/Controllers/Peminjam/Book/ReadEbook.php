<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class ReadEbook extends Controller
{
    public function show_read_e_book($id)
    {
        return view('peminjam_views.buku.baca-e-book', [
            'title' => 'Baca E-Book',
            'book' => Book::find($id),
        ]);
    }
}
