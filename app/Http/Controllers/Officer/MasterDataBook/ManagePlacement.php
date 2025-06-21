<?php

namespace App\Http\Controllers\Officer\MasterDataBook;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PlacementRequest;
use App\Models\Placement;

class ManagePlacement extends Controller
{
    public function store_placement(PlacementRequest $request)
    {
        $validated_data = $request->validated();
        $placement = Placement::create($validated_data);

        $this->log("Menempatkan buku dengan judul \"{$placement->book->judul}\" ke rak {$placement->shelf->nama_rak} sebanyak {$placement->jumlah_buku} buku");
        return redirect()->route('data-penempatan')->withSuccess('Berhasil menambahkan penempatan baru');
    }

    public function update_placement(PlacementRequest $request, $id)
    {
        $validated_data = $request->validated();
        $placement = Placement::findOrFail($id);
        $placement->update($validated_data);
        $this->log("Memperbarui penempatan buku \"{$placement->book->judul}\" pada rak {$placement->shelf->nama_rak}");
        return redirect()->route('data-penempatan')->withSuccess('Berhasil memperbarui penempatan buku');
    }

    public function delete_placement($id)
    {
        $placement = Placement::findOrFail($id);
        $placement->delete();
        $this->log("Menghapus data penempatan buku \"{$placement->book->judul}\" dan rak {$placement->shelf->nama_rak}");
        return redirect()->route('data-penempatan')->withSuccess('Berhasil menghapus data penempatan buku');
    }
}
