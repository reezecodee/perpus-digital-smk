<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\StoreBookRequest;
use App\Models\Book;
use App\Models\Category;
use App\Models\Shelf;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function show_data_rak_buku()
    {
        return view('pustakawan_views.master_data.buku.rak_buku.index', [
            'title' => 'Daftar Data Rak Buku',
            'heading' => 'Daftar Rak Buku',
            'shelves' => Shelf::all(),
        ]);
    }

    public function show_data_kategori()
    {
        return view('pustakawan_views.master_data.buku.kategori.index', [
            'title' => 'Daftar Data Kategori',
            'heading' => 'Daftar Kategori',
            'categories' => Category::all(),
        ]);
    }

    public function show_data_buku($format)
    {
        $formats = ['elektronik', 'fisik'];

        if(!in_array($format, $formats)){
            abort(404);
        }

        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.index', [
            'title' => 'Daftar Data Buku ' . $uc_first_format,
            'heading' => 'Daftar Buku ' . $uc_first_format,
            'books' => Book::where('format', $uc_first_format)->get(),
            'format' => $format
        ]);
    }

    public function show_add_book($format) 
    {
        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.form', [
            'title' => 'Tambah Buku ' . $uc_first_format,
            'heading' => 'Tambah Buku ' . $uc_first_format,
            'categories' => Category::all(),
            'data' => null
        ]);
    }

    public function show_edit_book($format, $id) 
    {
        $formats = ['elektronik', 'fisik'];

        if(!in_array($format, $formats)){
            abort(404);
        }

        $book = Book::findOrFail($id);
        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.form', [
            'title' => 'Tambah Buku ' . $uc_first_format,
            'heading' => 'Tambah Buku ' . $uc_first_format,
            'data' => $book,
            'format' => $format
        ]);
    }
}
