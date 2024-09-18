<?php

namespace App\Http\Controllers\Borrower\Shelf;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ShelfController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman semua daftar rak buku.
     *
     */

    public function showAllShelves()
    {
        $title = 'Semua Rak Buku Perpustakaan';
        $shelves = Shelf::withCount('placement')->get();

        return view('borrower-pages.shelf.all-shelves', compact('title', 'shelves'));
    }


    /**
     * Function ini digunakan untuk menampilkan semua buku yang dalam cakupan rak buku tertentu.
     *
     */

    public function showShelf($id)
    {
        $shelf = Shelf::findOrFail($id);
        $placements = Placement::with('book:id,cover_buku')->where('rak_id', $id)->get();
        $title = "Rak Buku {$shelf->nama_rak}";

        return view('borrower-pages.shelf.book-list', compact('title', 'shelf', 'placements'));
    }
}
