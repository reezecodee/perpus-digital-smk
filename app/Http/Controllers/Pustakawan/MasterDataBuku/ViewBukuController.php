<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewBukuController extends Controller
{
    public function show_data_rak_buku()
    {
        return view('pustakawan_views.master_data.buku.CRUD_rak_buku.index', [
            'title' => 'Daftar Data Rak Buku',
            'heading' => 'Daftar Rak Buku'
        ]);
    }

    public function show_data_kategori()
    {
        return view('pustakawan_views.master_data.buku.CRUD_kategori.index', [
            'title' => 'Daftar Data Kategori',
            'heading' => 'Daftar Kategori'
        ]);
    }

    public function show_data_ebook()
    {
        return view('pustakawan_views.master_data.buku.CRUD_e-book.index', [
            'title' => 'Daftar Data E-book',
            'heading' => 'Daftar E-book'
        ]);
    }

    public function show_data_buku()
    {
        return view('pustakawan_views.master_data.buku.CRUD_buku.index', [
            'title' => 'Daftar Data Buku',
            'heading' => 'Daftar Buku'
        ]);
    }
}
