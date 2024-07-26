<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show_book_page()
    {
        return view('peminjam_views.buku.detail_buku', [
            'title' => 'Detail Buku'
        ]);
    }

    public function show_confirm_page()
    {
        return view('peminjam_views.buku.konfirmasi_peminjaman', [
            'title' => 'Konfirmasi Peminjaman'
        ]);
    }
}
