<?php

namespace App\Http\Controllers\Officer\Shelf;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use App\Models\Shelf;

class ManageShelfController extends Controller
{
    public function showShelf()
    {
        $title = 'Manajemen Rak Buku';
        $name = 'Overview';
        $pageTitle = 'Manajemen Rak Buku';
        $type = 'btn-modal';
        $btnName = 'Tambah Rak Buku';

        return view('officer-pages.book-management.shelf.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function showShelfEdit($id)
    {
        $shelf = Shelf::findOrFail($id);

        $title = 'Edit Rak Buku';
        $name = 'Edit';
        $pageTitle = 'Edit Rak Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-rak');

        return view('officer-pages.book-management.shelf.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'shelf'));
    }

    public function showShelfDetail($id)
    {
        $shelf = Shelf::findOrFail($id);

        $title = 'Detail Rak Buku';
        $name = 'Detail';
        $pageTitle = 'Detail Rak Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data-rak');
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();

        return view('officer-pages.book-management.shelf.detail', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'shelf', 'books'));
    }

    public function showPlacementEdit($id)
    {
        $placement = Placement::findOrFail($id);

        $title = 'Edit Penempatan Buku';
        $name = 'Edit';
        $pageTitle = 'Edit Penempatan Buku';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('detail_shelf', $placement->shelf->id);

        return view('officer-pages.book-management.shelf.edit-placement', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'placement'));
    }
}
