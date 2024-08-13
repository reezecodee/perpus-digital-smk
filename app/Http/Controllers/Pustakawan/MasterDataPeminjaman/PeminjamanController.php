<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPeminjaman;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use App\Models\Fine;
use App\Models\Visit;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function show_data_peminjam()
    {
        return view('pustakawan_views.master_data.peminjaman.peminjaman.index', [
            'title' => 'Data Peminjaman',
            'heading' => 'Perpinjaman',
            'borrowers' => Borrower::whereNotIn('status', ['E-book', 'Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'])->latest()->get(),
        ]);
    }

    public function show_data_pengembali()
    {
        return view('pustakawan_views.master_data.peminjaman.pengembalian.index', [
            'title' => 'Data Pengembalian',
            'heading' => 'Pengembalian',
            'borrowers' => Borrower::whereNotIn('status', ['E-book', 'Terkena denda', 'Masa pinjam', 'Masa pengembalian', 'Menunggu persetujuan', 'Disetujui']),
        ]);
    }

    public function show_data_kunjungan()
    {
        return view('pustakawan_views.master_data.peminjaman.kunjungan.index', [
            'title' => 'Data Kunjungan',
            'heading' => 'Kunjungan',
            'visits' => Visit::orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function show_data_denda()
    {
        return view('pustakawan_views.master_data.peminjaman.denda.index', [
            'title' => 'Data Denda',
            'heading' => 'Denda',
            'fines' => Fine::all(),
        ]);
    }
}
