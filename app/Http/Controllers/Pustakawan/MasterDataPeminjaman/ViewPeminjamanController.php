<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPeminjaman;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewPeminjamanController extends Controller
{
    public function show_data_peminjam()
    {
        return view('pustakawan_views.master_data.peminjaman.CRUD_peminjaman.index', [
            'title' => 'Data Peminjaman',
            'heading' => 'Peminjaman'
        ]);
    }

    public function show_data_pengembali()
    {
        return view('pustakawan_views.master_data.peminjaman.CRUD_pengembalian.index', [
            'title' => 'Data Pengembalian',
            'heading' => 'Pengembalian'
        ]);
    }

    public function show_data_kunjungan()
    {
        return view('pustakawan_views.master_data.peminjaman.kunjungan.index', [
            'title' => 'Data Kunjungan',
            'heading' => 'Kunjungan'
        ]);
    }

    public function show_data_denda()
    {
        return view('pustakawan_views.master_data.peminjaman.CRUD_denda.index', [
            'title' => 'Data Denda',
            'heading' => 'Denda'
        ]);
    }
}
