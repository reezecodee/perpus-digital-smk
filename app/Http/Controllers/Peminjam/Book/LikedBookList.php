<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\LikedBook;
use Illuminate\Http\Request;

class LikedBookList extends Controller
{
    public function show_liked_book()
    {
        return view('peminjam_views.buku.buku-disukai', [
            'title' => 'Buku yang Anda Sukai',
            'liked_books' => LikedBook::where('peminjam_id', auth()->user()->id)->latest()->get()
        ]);
    }
}
