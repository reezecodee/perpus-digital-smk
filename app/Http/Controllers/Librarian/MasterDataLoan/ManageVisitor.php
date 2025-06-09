<?php

namespace App\Http\Controllers\Librarian\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\VisitRequest;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;

class ManageVisitor extends Controller
{
    public function show_data_visit()
    {
        $title = 'Manajemen Kunjungan';
        $name = 'Overview';
        $pageTitle = 'Manajemen Kunjungan';
        $type = 'btn-modal';
        $btnName = 'Tambah Kunjungan';
        $students = User::role('Siswa')->where('status', 'Aktif')->latest()->get();

        return view('test_views.loan-management.visit.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students'));
    }

    public function show_edit_visit($id)
    {
        $title = 'Edit Kunjungan';
        $name = 'Edit';
        $pageTitle = 'Edit Kunjungan';
        $type = 'btn-back';
        $btnName = 'Kembali';
        $url = route('data_kunjungan');
        $visit = Visit::findOrFail($id);

        return view('test_views.loan-management.visit.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'url', 'visit'));
    }

    // Logical Backend Here...

    public function store_visit(VisitRequest $request)
    {
        $validated_data = $request->validated();
        $visit = Visit::create($validated_data);
        $this->log("Menambahkan data kunjungan untuk {$visit->peminjam->nama} untuk tanggal {$visit->tanggal_kunjungan}");
        return redirect()->route('data_kunjungan')->withSuccess('Berhasil menambahkan data kunjungan');
    }

    public function update_visit(Request $request, $id)
    {
        $validated_data = $request->validate(
            [
                'status_kunjungan' => 'required|in:Menunggu persetujuan,Diterima,Ditolak',
            ],
            [
                'status_kunjungan.required' => 'Status kunjungan wajib diisi.',
                'status_kunjungan.in' => 'Status kunjungan harus salah satu dari: Menunggu persetujuan, Diterima, atau Ditolak.',
            ]
        );

        $visit = Visit::findOrFail($id);

        $visit->update($validated_data);

        $peminjamNama = $visit->peminjam->nama;
        $this->log("Memperbarui data kunjungan milik {$peminjamNama}");

        return back()->with('success', 'Berhasil memperbarui data kunjungan.');
    }

    public function delete_visit($id)
    {
        $visit = Visit::find($id);
        $visit->delete();

        $this->log("Menghapus data kunjungan milik {$visit->peminjam->nama}");
        return back()->withSuccess('Berhasil menghapus data kunjungan');
    }
}
