<?php

namespace App\Http\Controllers\Peminjam\Visit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Visit\AddVisitRequest;
use App\Models\Visit;
use Illuminate\Http\Request;

class VisitController extends Controller
{
    public function show_visit()
    {
        return view('peminjam_views.kunjungan.kunjungan', [
            'title' => 'Form Kunjungan Perpustakaan',
            'visits' => Visit::where('pengunjung_id', auth()->user()->id)->latest()->get()
        ]);
    }

    public function add_visit(AddVisitRequest $request)
    {
        $data = $request->validated();
        $data['pengunjung_id'] = auth()->user()->id;
        $data['tanggal_kunjungan'] = date('Y-m-d');
        $data['status_kunjungan'] = 'Menunggu persetujuan';

        Visit::create($data);

        return back()->withSuccess('Permohonan kunjungan berhasil ditambahkan');
    }

    public function delete_visit($id)
    {
        $visit = Visit::find($id);
        if ($visit) {
            $visit->delete();
            return back()->withSuccess('Berhasil menghapus data kunjungan Anda');
        }

        return back();
    }
}
