<?php

namespace App\Http\Controllers\Student\BookLiked;

use App\Http\Controllers\Controller;
use App\Models\LikedBook;

class BookLikedListController extends Controller
{
    public function showBookLikedPage()
    {
        $title = 'Daftar Buku Yang Anda Sukai';
        $likedBooks = LikedBook::where('peminjam_id', auth()->user()->id)->latest()->get();

        return view('student-pages.book.books-liked', compact('title', 'likedBooks'));
    }
}
