<?php

namespace App\Http\Controllers\Borrower\BookLiked;

use App\Http\Controllers\Controller;
use App\Models\LikedBook;
use Illuminate\Http\Request;

class BookLikedListController extends Controller
{
    /**
     * Function digunakan untuk menampilkan list buku yang disukai oleh user.
     * 
     */

    public function showBookLikedPage()
    {
        $title = 'Daftar Buku Yang Anda Sukai';
        $likedBooks = LikedBook::where('peminjam_id', auth()->user()->id)->latest()->get();

        return view('borrower-pages.book.books-liked', compact('title', 'likedBooks'));
    }
}
