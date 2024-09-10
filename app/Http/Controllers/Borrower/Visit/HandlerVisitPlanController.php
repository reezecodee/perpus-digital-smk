<?php

namespace App\Http\Controllers\Borrower\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\AddVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class HandlerVisitPlanController extends Controller
{
    /**
     * Function ini digunakan untuk menambahkan rencana kunjungan user.
     * 
     */

    public function addVisit(AddVisitRequest $request)
    {
        $data = $request->validated();
        $data['pengunjung_id'] = auth()->user()->id;
        $data['tanggal_kunjungan'] = date('Y-m-d');
        $data['status_kunjungan'] = 'Menunggu persetujuan';

        Visit::create($data);

        $this->log('Melakukan permohonan izin kunjungan perpustakaan');
        return back()->withSuccess('Permohonan kunjungan berhasil ditambahkan');
    }


    /**
     * Function ini digunakan untuk menghapus rencana kunjungan user.
     * 
     */

    public function deleteMyVisit($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        $this->log('Menghapus dan membatalkan permohonan kunjungan perpustakaan');
        return back()->withSuccess('Berhasil menghapus data kunjungan Anda');
    }
}
