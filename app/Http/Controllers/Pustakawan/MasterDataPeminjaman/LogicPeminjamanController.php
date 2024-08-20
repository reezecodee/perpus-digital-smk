<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPeminjaman;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PeminjamRequest;
use App\Http\Requests\MasterData\VisitRequest;
use App\Models\Borrower;
use App\Models\Visit;
use Illuminate\Http\Request;

class LogicPeminjamanController extends Controller
{
    private function generate_code()
    {
        return str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
    }

    public function store_peminjaman(PeminjamRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['kode_peminjaman'] = $this->generate_code();
        $validated_data['status'] = 'Masa pinjam';
        $validated_data['keterangan_denda'] = 'Tidak ada';

        Borrower::create($validated_data);
        return redirect()->route('data_perpinjaman')->withSuccess('Berhasil menambahkan peminjaman baru');
    }

    public function update_peminjaman(PeminjamRequest $request, $id)
    {
        $validated_data = $request->validated();
        $peminjaman = Borrower::findOrFail($id);
        $peminjaman->update($validated_data);

        return back()->withSuccess('Berhasil memperbarui data peminjaman');
    }

    public function delete_peminjaman($id)
    {
        $peminjaman = Borrower::findOrFail($id);
        $peminjaman->delete();
        return back()->withSuccess('Berhasil menghapus data peminjaman');
    }

    public function store_visit(VisitRequest $request)
    {
        $validated_data = $request->validated();
        Visit::create($validated_data);
        return redirect()->route('data_kunjungan')->withSuccess('Berhasil menambahkan data kunjungan');
    }

    public function update_visit(VisitRequest $request, $id)
    {
        $validated_data = $request->validated();
        $visit = Visit::find($id);
        $visit->update($validated_data);
        return back()->withSuccess('Berhasil memperbarui data kunjungan');
    }

    public function delete_visit($id)
    {
        $visit = Visit::find($id);
        $visit->delete();
        return back()->withSuccess('Berhasil menghapus data kunjungan');
    }
}
