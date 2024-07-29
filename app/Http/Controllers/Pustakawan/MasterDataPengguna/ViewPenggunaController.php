<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPengguna;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewPenggunaController extends Controller
{
    public function show_data_admin_page()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_admin.index', [
            'title' => 'Daftar Data Admin',
            'heading' => 'Daftar Admin'
        ]);
    }

    public function show_data_pustakawan_page()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_pustakawan.index', [
            'title' => 'Daftar Data Pustakawan',
            'heading' => 'Daftar Pustakawan'
        ]);
    }

    public function show_data_peminjam_page()
    {
        return view('pustakawan_views.master_data.pengguna.CRUD_peminjam.index', [
            'title' => 'Daftar Data Peminjam',
            'heading' => 'Daftar Peminjam'
        ]);
    }
}
