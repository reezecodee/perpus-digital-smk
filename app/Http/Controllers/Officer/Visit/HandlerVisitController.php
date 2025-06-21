<?php

namespace App\Http\Controllers\Officer\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\Officer\OfficerUpdateVisitRequest;
use App\Http\Requests\Visit\Officer\OfficerVisitRequest;
use App\Models\Visit;
use App\Repositories\Logger\ActivityLogger;
use Illuminate\Http\Request;

class HandlerVisitController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function storeVisit(OfficerVisitRequest $request)
    {
        $validatedData = $request->validated();
        $visit = Visit::create($validatedData);

        $message = "Menambahkan data kunjungan untuk {$visit->peminjam->nama} untuk tanggal {$visit->tanggal_kunjungan}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data_kunjungan')->withSuccess('Berhasil menambahkan data kunjungan');
    }

    public function updateVisit(OfficerUpdateVisitRequest $request, $id)
    {
        $validatedData = $request->validated();

        $visit = Visit::findOrFail($id);
        $visit->update($validatedData);

        $borrowerName = $visit->peminjam->nama;

        $message = "Memperbarui data kunjungan milik {$borrowerName}";
        $this->activityLogger->saveLog($message);

        return back()->with('success', 'Berhasil memperbarui data kunjungan.');
    }

    public function deleteVisit($id)
    {
        $visit = Visit::find($id);
        $visit->delete();

        $message = "Menghapus data kunjungan milik {$visit->peminjam->nama}";
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil menghapus data kunjungan');
    }
}
