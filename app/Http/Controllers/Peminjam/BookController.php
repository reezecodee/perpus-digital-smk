<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function show_book()
    {
        return view('peminjam_views.buku.detail_buku', [
            'title' => 'Detail Buku'
        ]);
    }

    public function show_confirm()
    {
        return view('peminjam_views.buku.konfirmasi_peminjaman', [
            'title' => 'Konfirmasi Peminjaman'
        ]);
    }

    public function show_success()
    {
        return view('peminjam_views.buku.sukses', [
            'title' => 'Peminjaman Sukses'
        ]);
    }

    public function show_my_shelf()
    {
        return view('peminjam_views.rak_buku', [
            'title' => 'Rak Buku Saya'
        ]);
    }

    public function show_detail_rent()
    {
        return view('peminjam_views.detail_peminjaman', [
            'title' => 'Detail Peminjaman'
        ]);
    }

    public function show_liked_book()
    {
        return view('peminjam_views.buku_disukai', [
            'title' => 'Buku yang Anda Sukai'
        ]);
    }

    public function show_all_books()
    {
        return view('peminjam_views.buku.semua_buku', [
            'title' => 'Semua Buku Perpustakaan'
        ]);
    }

    public function show_search_result()
    {
        return view('peminjam_views.hasil_pencarian', [
            'title' => 'Hasil Pencarian Buku'
        ]);
    }
}
