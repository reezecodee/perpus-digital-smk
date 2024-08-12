<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Shelf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show_data_rak_buku()
    {
        return view('pustakawan_views.master_data.buku.CRUD_rak_buku.index', [
            'title' => 'Daftar Data Rak Buku',
            'heading' => 'Daftar Rak Buku',
            'shelves' => Shelf::all(),
        ]);
    }

    public function show_data_kategori()
    {
        return view('pustakawan_views.master_data.buku.CRUD_kategori.index', [
            'title' => 'Daftar Data Kategori',
            'heading' => 'Daftar Kategori',
            'categories' => Category::all(),
        ]);
    }

    public function show_data_ebook()
    {
        return view('pustakawan_views.master_data.buku.CRUD_e-book.index', [
            'title' => 'Daftar Data E-book',
            'heading' => 'Daftar E-book',
            'e_books' => Book::where('format', 'Elektronik')->get(),
        ]);
    }

    public function show_data_buku()
    {
        return view('pustakawan_views.master_data.buku.CRUD_buku.index', [
            'title' => 'Daftar Data Buku',
            'heading' => 'Daftar Buku',
            'books' => Book::where('format', 'Fisik')->get(),
        ]);
    }
}
