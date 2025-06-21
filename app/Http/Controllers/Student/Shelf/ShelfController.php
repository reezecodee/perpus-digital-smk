<?php

namespace App\Http\Controllers\Student\Shelf;

use App\Http\Controllers\Controller;
use App\Models\Placement;
use App\Models\Shelf;

class ShelfController extends Controller
{
    public function showAllShelves()
    {
        $title = 'Semua Rak Buku Perpustakaan';
        $shelves = Shelf::withCount('placement')->get();

        return view('student-pages.shelf.all-shelves', compact('title', 'shelves'));
    }

    public function showShelf($id)
    {
        $shelf = Shelf::findOrFail($id);
        $placements = Placement::with('book:id,cover_buku')->where('rak_id', $id)->get();
        $title = "Rak Buku {$shelf->nama_rak}";

        return view('student-pages.shelf.book-list', compact('title', 'shelf', 'placements'));
    }
}
