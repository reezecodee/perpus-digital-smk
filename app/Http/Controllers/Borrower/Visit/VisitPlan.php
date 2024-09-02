<?php

namespace App\Http\Controllers\Borrower\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\AddVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitPlan extends Controller
{
    public function show_visit()
    {
        return view('borrower-pages.visit.visit-plan', [
            'title' => 'Form Kunjungan Perpustakaan',
            'visits' => Visit::where('pengunjung_id', auth()->user()->id)->latest()->get()
        ]);
    }

    // Logical Backend Here...
    
    public function add_visit(AddVisitRequest $request)
    {
        $data = $request->validated();
        $data['pengunjung_id'] = auth()->user()->id;
        $data['tanggal_kunjungan'] = date('Y-m-d');
        $data['status_kunjungan'] = 'Menunggu persetujuan';

        Visit::create($data);

        $this->log('Melakukan permohonan izin kunjungan perpustakaan');
        return back()->withSuccess('Permohonan kunjungan berhasil ditambahkan');
    }

    public function delete_my_visit($id)
    {
        $visit = Visit::findOrFail($id);
        $visit->delete();
        $this->log('Menghapus dan membatalkan permohonan kunjungan perpustakaan');
        return back()->withSuccess('Berhasil menghapus data kunjungan Anda');
    }
}
