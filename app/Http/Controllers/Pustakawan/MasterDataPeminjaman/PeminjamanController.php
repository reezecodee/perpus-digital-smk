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
        return view('pustakawan_views.master_data.peminjaman.CRUD_peminjaman.index', [
            'title' => 'Data Peminjaman',
            'heading' => 'Peminjaman',
            'borrowers' => Borrower::all(),
        ]);
    }

    public function show_data_pengembali()
    {
        return view('pustakawan_views.master_data.peminjaman.CRUD_pengembalian.index', [
            'title' => 'Data Pengembalian',
            'heading' => 'Pengembalian',
            'borrowers' => Borrower::all(),
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
        return view('pustakawan_views.master_data.peminjaman.CRUD_denda.index', [
            'title' => 'Data Denda',
            'heading' => 'Denda',
            'fines' => Fine::all(),
        ]);
    }
}
