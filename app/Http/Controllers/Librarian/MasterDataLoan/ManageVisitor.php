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

    public function show_add_visit()
    {
        return view('librarian-pages.master-data.loan-management.visit.form', [
            'title' => 'Daftarkan Data Kunjungan',
            'heading' => 'Daftarkan Kunjungan',
            'visit' => null,
            'visitors' => User::role('Peminjam')->where('status', 'Aktif')->get()
        ]);
    }

    public function show_edit_visit($id)
    {
        return view('librarian-pages.master-data.loan-management.visit.form', [
            'title' => 'Edir Data Kunjungan',
            'heading' => 'Edit Kunjungan',
            'visit' => Visit::find($id),
            'visitors' => User::role('Peminjam')->where('status', 'Aktif')->get()
        ]);
    }

    // Logical Backend Here...

    public function store_visit(VisitRequest $request)
    {
        $validated_data = $request->validated();
        $visit = Visit::create($validated_data);
        $this->log("Menambahkan data kunjungan untuk {$visit->peminjam->nama} untuk tanggal {$visit->tanggal_kunjungan}");
        return redirect()->route('data_kunjungan')->withSuccess('Berhasil menambahkan data kunjungan');
    }

    public function update_visit(VisitRequest $request, $id)
    {
        $validated_data = $request->validated();
        $visit = Visit::find($id);
        $visit->update($validated_data);
        $this->log("Memperbarui data kunjungan milik {$visit->peminjam->nama}");
        return back()->withSuccess('Berhasil memperbarui data kunjungan');
    }

    public function delete_visit($id)
    {
        $visit = Visit::find($id);
        $visit->delete();
        
        $this->log("Menghapus data kunjungan milik {$visit->peminjam->nama}");
        return back()->withSuccess('Berhasil menghapus data kunjungan');
    }
}
