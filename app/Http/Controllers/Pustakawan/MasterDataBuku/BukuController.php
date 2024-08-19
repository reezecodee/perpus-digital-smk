<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use App\Models\Fine;
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
            'categories' => Category::withCount('book')->get(),
        ]);
    }

    public function show_data_buku($format)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.index', [
            'title' => 'Daftar Data Buku ' . $uc_first_format,
            'heading' => 'Daftar Buku ' . $uc_first_format,
            'books' => Book::where('format', $uc_first_format)->latest()->get(),
            'format' => $format
        ]);
    }

    public function show_data_denda()
    {
        $booksWithoutFines = Book::where('format', 'Fisik')->doesntHave('fine')->get();

        return view('pustakawan_views.master_data.buku.denda.index', [
            'title' => 'Data Denda Buku',
            'heading' => 'Denda Buku',
            'fines' => Fine::all(),
            'without_fines' => $booksWithoutFines
        ]);
    }

    public function show_add_book($format)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.form', [
            'title' => 'Tambah Buku ' . $uc_first_format,
            'heading' => 'Tambah Buku ' . $uc_first_format,
            'categories' => Category::all(),
            'data' => null,
            'format' => $format
        ]);
    }

    public function show_edit_book($format, $id)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $book = Book::findOrFail($id);
        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.form', [
            'title' => 'Edit Buku ' . $uc_first_format,
            'heading' => 'Edit Buku ' . $uc_first_format,
            'data' => $book,
            'format' => $format,
            'categories' => Category::all(),
        ]);
    }

    public function show_detail_book($format, $id)
    {
        $formats = ['elektronik', 'fisik'];

        if (!in_array($format, $formats)) {
            abort(404);
        }

        $book = Book::findOrFail($id);
        $uc_first_format = ucfirst($format);

        return view('pustakawan_views.master_data.buku.buku.detail', [
            'title' => 'Detail Buku ' . $book->judul,
            'heading' => 'Detail Buku ' . $uc_first_format,
            'data' => $book,
            'format' => $format
        ]);
    }

    public function show_edit_category($id)
    {
        $category = Category::findOrFail($id);

        return view('pustakawan_views.master_data.buku.kategori.edit', [
            'title' => 'Edit Data Kategori',
            'heading' => 'Edit Kategori',
            'books' => Book::where('kategori_id', $id)->latest()->get(),
            'data' => $category
        ]);
    }

    public function show_edit_shelf($id)
    {
        $shelf = Shelf::findOrFail($id);

        return view('pustakawan_views.master_data.buku.rak_buku.edit', [
            'title' => 'Edit Data Rak',
            'heading' => 'Edit Rak',
            'data' => $shelf
        ]);
    }
}
