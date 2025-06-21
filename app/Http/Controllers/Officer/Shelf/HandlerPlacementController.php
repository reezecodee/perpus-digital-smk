<?php

namespace App\Http\Controllers\Officer\Shelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shelf\Officer\OfficerPlacementRequest;
use App\Models\Placement;
use App\Repositories\Logger\ActivityLogger;

class HandlerPlacementController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }
    
    public function storePlacement(OfficerPlacementRequest $request)
    {
        $validatedData = $request->validated();
        $placement = Placement::create($validatedData);

        $message = "Menempatkan buku dengan judul \"{$placement->book->judul}\" ke rak {$placement->shelf->nama_rak} sebanyak {$placement->jumlah_buku} buku";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-penempatan')->withSuccess('Berhasil menambahkan penempatan baru');
    }

    public function updatePlacement(OfficerPlacementRequest $request, $id)
    {
        $validatedData = $request->validated();
        $placement = Placement::findOrFail($id);
        $placement->update($validatedData);

        $message = "Memperbarui penempatan buku \"{$placement->book->judul}\" pada rak {$placement->shelf->nama_rak}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-penempatan')->withSuccess('Berhasil memperbarui penempatan buku');
    }

    public function destroyPlacement($id)
    {
        $placement = Placement::findOrFail($id);
        $placement->delete();

        $message = "Menghapus data penempatan buku \"{$placement->book->judul}\" dan rak {$placement->shelf->nama_rak}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-penempatan')->withSuccess('Berhasil menghapus data penempatan buku');
    }
}
