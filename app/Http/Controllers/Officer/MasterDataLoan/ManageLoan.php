<?php

namespace App\Http\Controllers\Officer\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PeminjamRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Placement;
use App\Models\User;

class ManageLoan extends Controller
{
    public function show_data_peminjam()
    {
        $title = 'Manajemen Peminjaman';
        $name = 'Overview';
        $pageTitle = 'Manajemen Peminjaman';
        $type = 'btn-modal';
        $btnName = 'Tambah Peminjaman';
        $students = User::role('Siswa')->where('status', 'Aktif')->get();
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();
        $placements = Placement::all();

        return view('officer-pages.loan-management.loan.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students', 'books', 'placements'));
    }

    public function show_edit_peminjaman($id)
    {
        $title = 'Edit Peminjaman';
        $name = 'Edit';
        $pageTitle = 'Edit Peminjaman';
        $type = '';
        $btnName = 'Kembali';
        $loan = Loan::findOrFail($id);
        $students = User::role('Siswa')->where('status', 'Aktif')->get();
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();
        $placements = Placement::all();

        return view('officer-pages.loan-management.loan.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students', 'books', 'placements', 'loan'));
    }

    public function show_detail_peminjaman($id)
    {
        return view('librarian-pages.master-data.loan-management.loan.detail', [
            'title' => 'Detail Peminjam Buku',
            'heading' => 'Detail Peminjam Buku',
            'data' => Loan::where('id', $id)->first()
        ]);
    }

    // Logical Backend Here...

    private function generate_code()
    {
        return str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
    }

    public function store_peminjaman(PeminjamRequest $request)
    {
        $validated_data = $request->validated();
        $validated_data['kode_peminjaman'] = $this->generate_code();
        $validated_data['keterangan_denda'] = 'Tidak ada';

        $loan = Loan::create($validated_data);

        $this->log("Memberikan izin peminjaman buku \"{$loan->book->judul}\" kepada {$loan->peminjam->nama}");
        return redirect()->route('data_perpinjaman')->withSuccess('Berhasil menambahkan peminjaman baru');
    }

    public function update_peminjaman(PeminjamRequest $request, $id)
    {
        $validated_data = $request->validated();
        $peminjaman = Loan::findOrFail($id);
        $peminjaman->update($validated_data);

        $this->log('Memperbarui data peminjaman');
        return back()->withSuccess('Berhasil memperbarui data peminjaman');
    }

    public function delete_peminjaman($id)
    {
        $loan = Loan::findOrFail($id);
        $loan->delete();
        $this->log("Menghapus data peminjaman buku \"{$loan->book->judul}\" yang dipinjam oleh {$loan->peminjam->nama}");
        return back()->withSuccess('Berhasil menghapus data peminjaman');
    }
}
