<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PlacementRequest;
use App\Models\Book;
use App\Models\Placement;
use App\Models\Shelf;
use Illuminate\Http\Request;

class ManagePlacement extends Controller
{
    public function show_placement()
    {
        $placements = Placement::with(['shelf', 'book'])->latest()->get();
        return view('pustakawan_views.master_data.buku.penempatan.index', [
            'title' => 'Penempatan Buku',
            'heading' => 'Penempatan Buku',
            'placements' => $placements
        ]);
    }

    public function show_add_placement()
    {
        return view('pustakawan_views.master_data.buku.penempatan.form', [
            'title' => 'Tambah Penempatan Buku',
            'heading' => 'Tambah Penempatan',
            'placement' => null,
            'books' => Book::where('status', 'Tersedia')->get(),
            'shelves' => Shelf::all()
        ]);
    }

    public function show_edit_placement($id)
    {
        $placement = Placement::findOrFail($id);

        return view('pustakawan_views.master_data.buku.penempatan.form', [
            'title' => 'Edit Penempatan Buku',
            'heading' => 'Edit Penempatan',
            'placement' => $placement,
            'books' => Book::where('status', 'Tersedia')->get(),
            'shelves' => Shelf::all()
        ]);
    }

    public function store_placement(PlacementRequest $request)
    {
        $validated_data = $request->validated();
        Placement::create($validated_data);
        return redirect()->route('data-penempatan')->withSuccess('Berhasil menambahkan penempatan baru');
    }

    public function update_placement(PlacementRequest $request, $id)
    {
        $validated_data = $request->validated();
        $placement = Placement::findOrFail($id);
        $placement->update($validated_data);
        return redirect()->route('data-penempatan')->withSuccess('Berhasil memperbarui penempatan buku');
    }

    public function delete_placement($id)
    {
        $placement = Placement::findOrFail($id);
        $placement->delete();
        return redirect()->route('data-penempatan')->withSuccess('Berhasil menghapus data penempatan buku');
    }
}
