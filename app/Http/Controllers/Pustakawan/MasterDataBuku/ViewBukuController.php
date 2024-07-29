<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewBukuController extends Controller
{
    public function show_data_rak_buku_page()
    {
        return view('pustakawan_views.master_data.buku.CRUD_rak_buku.index', [
            'title' => 'Data Rak Buku',
            'heading' => 'Rak Buku'
        ]);
    }

    public function show_data_kategori_page()
    {
        return view('pustakawan_views.master_data.buku.CRUD_kategori.index', [
            'title' => 'Data Kategori',
            'heading' => 'Kategori'
        ]);
    }

    public function show_data_ebook_page()
    {
        return view('pustakawan_views.master_data.buku.CRUD_e-book.index', [
            'title' => 'Data E-book',
            'heading' => 'E-book'
        ]);
    }

    public function show_data_buku_page()
    {
        return view('pustakawan_views.master_data.buku.CRUD_buku.index', [
            'title' => 'Data Buku',
            'heading' => 'Buku'
        ]);
    }
}
