<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPeminjaman;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Borrower;
use App\Models\User;
use App\Models\Visit;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function show_data_peminjam()
    {
        $ucfirst_filter = ucfirst(request('filter'));
        $status = [
            'Masa pinjam',
            'Masa pengembalian',
            'Menunggu persetujuan',
            'Ditolak',
            'Menunggu diambil',
        ];

        if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
            abort(404); 
        }

        $borrowersQuery = Borrower::query();

        if ($ucfirst_filter) {
            $borrowersQuery->where('status', $ucfirst_filter);
        } else {
            $borrowersQuery->whereIn('status', $status);
        }

        $borrowers = $borrowersQuery->latest()->get();

        return view('pustakawan_views.master_data.peminjaman.peminjaman.index', [
            'title' => 'Data Peminjaman Buku',
            'heading' => 'Peminjaman Buku',
            'borrowers' => $borrowers,
        ]);
    }

    public function show_add_peminjaman()
    {
        return view('pustakawan_views.master_data.peminjaman.peminjaman.form', [
            'title' => 'Tambah Peminjam Buku',
            'heading' => 'Tambah Peminjam Buku',
            'borrowers' => User::role('Peminjam')->get(),
            'books' => Book::where('status', 'Tersedia')->get(),
            'peminjaman' => null
        ]);
    }

    public function show_edit_peminjaman($id)
    {
        return view('pustakawan_views.master_data.peminjaman.peminjaman.form', [
            'title' => 'Edit Peminjam Buku',
            'heading' => 'Edit Peminjam Buku',
            'borrowers' => User::role('Peminjam')->get(),
            'books' => Book::where('status', 'Tersedia')->get(),
            'peminjaman' => Borrower::where('id', $id)->first()
        ]);
    }

    public function show_detail_peminjaman($id)
    {
        return view('pustakawan_views.master_data.peminjaman.peminjaman.detail', [
            'title' => 'Detail Peminjam Buku',
            'heading' => 'Detail Peminjam Buku',
            'data' => Borrower::where('id', $id)->first()
        ]);
    }

    public function show_data_pengembali()
    {
        $ucfirst_filter = ucfirst(request('filter'));
        $status = ['Sudah dikembalikan', 'Sudah diulas'];

        if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
            abort(404); 
        }

        $borrowersQuery = Borrower::query();

        if ($ucfirst_filter) {
            $borrowersQuery->where('status', $ucfirst_filter);
        } else {
            $borrowersQuery->whereIn('status', $status);
        }

        $borrowers = $borrowersQuery->latest()->get();

        return view('pustakawan_views.master_data.peminjaman.peminjaman.index', [
            'title' => 'Data Pengembalian Buku',
            'heading' => 'Pengembalian Buku',
            'borrowers' => $borrowers
        ]);
    }

    public function show_data_terkena_denda()
    {
        $ucfirst_filter = ucfirst(request('filter'));
        $status = ['Sudah dibayar', 'Terkena denda', 'Menunggu konfirmasi pembayaran'];

        if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
            abort(404); 
        }

        $borrowersQuery = Borrower::query();

        if ($ucfirst_filter) {
            $borrowersQuery->where('status', $ucfirst_filter);
        } else {
            $borrowersQuery->whereIn('status', $status);
        }

        $borrowers = $borrowersQuery->latest()->get();

        return view('pustakawan_views.master_data.peminjaman.peminjaman.index', [
            'title' => 'Data Terkena Denda',
            'heading' => 'Peminjam Terkena Denda',
            'borrowers' => $borrowers
        ]);
    }

    public function show_data_visit()
    {
        return view('pustakawan_views.master_data.peminjaman.kunjungan.index', [
            'title' => 'Data Kunjungan',
            'heading' => 'Kunjungan',
            'visits' => Visit::orderBy('created_at', 'desc')->limit(10)->get(),
        ]);
    }

    public function show_add_visit()
    {
        return view('pustakawan_views.master_data.peminjaman.kunjungan.form', [
            'title' => 'Daftarkan Data Kunjungan',
            'heading' => 'Daftarkan Kunjungan',
            'visit' => null,
            'visitors' => User::role('Peminjam')->get()
        ]);
    }

    public function show_edit_visit($id)
    {
        return view('pustakawan_views.master_data.peminjaman.kunjungan.form', [
            'title' => 'Edir Data Kunjungan',
            'heading' => 'Edit Kunjungan',
            'visit' => Visit::find($id),
            'visitors' => User::role('Peminjam')->get()
        ]);
    }
}
