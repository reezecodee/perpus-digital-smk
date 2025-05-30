<?php

namespace App\Http\Controllers\Librarian\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Http\Requests\MasterData\PeminjamRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\User;
use Illuminate\Http\Request;

class ManageLoan extends Controller
{
    public function show_data_peminjam()
    {
        // $ucfirst_filter = ucfirst(request('filter'));
        // $status = [
        //     'Masa pinjam',
        //     'Masa pengembalian',
        //     'Menunggu persetujuan',
        //     'Ditolak',
        //     'Menunggu diambil',
        // ];

        // if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
        //     abort(404); 
        // }

        // $borrowersQuery = Loan::query();

        // if ($ucfirst_filter) {
        //     $borrowersQuery->where('status', $ucfirst_filter);
        // } else {
        //     $borrowersQuery->whereIn('status', $status);
        // }

        // $borrowers = $borrowersQuery->latest()->get();

        // return view('librarian-pages.master-data.loan-management.loan.index', [
        //     'title' => 'Data Peminjaman Buku',
        //     'heading' => 'Peminjaman Buku',
        //     'borrowers' => $borrowers,
        // ]);
        $title = 'Manajemen Peminjaman';
        $name = 'Overview';
        $pageTitle = 'Manajemen Peminjaman';
        $type = 'btn-modal';
        $btnName = 'Tambah Peminjaman';

        return view('test_views.loan-management.loan.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function show_add_peminjaman()
    {
        return view('librarian-pages.master-data.loan-management.loan.form', [
            'title' => 'Tambah Peminjam Buku',
            'heading' => 'Tambah Peminjam Buku',
            'borrowers' => User::role('Peminjam')->where('status', 'Aktif')->get(),
            'books' => Book::where('status', 'Tersedia')->get(),
            'peminjaman' => null
        ]);
    }

    public function show_edit_peminjaman($id)
    {
        return view('librarian-pages.master-data.loan-management.loan.form', [
            'title' => 'Edit Peminjam Buku',
            'heading' => 'Edit Peminjam Buku',
            'borrowers' => User::role('Peminjam')->get(),
            'books' => Book::where('status', 'Tersedia')->get(),
            'peminjaman' => Loan::where('id', $id)->first()
        ]);
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
        $validated_data['status'] = 'Masa pinjam';
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
