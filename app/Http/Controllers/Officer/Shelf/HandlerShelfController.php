<?php

namespace App\Http\Controllers\Officer\Shelf;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shelf\Officer\OfficerShelfRequest;
use App\Http\Requests\Shelf\Officer\OfficerUpdateShelfRequest;
use App\Models\Shelf;
use App\Repositories\Logger\ActivityLogger;

class HandlerShelfController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function storeShelf(OfficerShelfRequest $request)
    {
        $validatedData = $request->validated();
        $shelf = Shelf::create($validatedData);

        $message = "Menambahkan rak buku baru dengan nama {$shelf->nama_rak}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-rak')->withSuccess('Berhasil menambah data rak');
    }

    public function updateShelf(OfficerUpdateShelfRequest $request, $id)
    {
        $validatedData = $request->validated();

        $shelf = Shelf::findOrFail($id);
        $shelf->update($validatedData);

        $message = "Memperbarui rak buku {$shelf->nama_rak}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data-rak')->withSuccess('Berhasil memperbarui data rak');
    }

    public function deleteShelf($id)
    {
        $shelf = Shelf::findOrFail($id);
        $shelf->delete();

        $message = "Menghapus rak buku dengan nama rak $shelf->nama_rak";
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil menghapus data rak');
    }
}
