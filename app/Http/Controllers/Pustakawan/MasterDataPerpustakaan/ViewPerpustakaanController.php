<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPerpustakaan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewPerpustakaanController extends Controller
{
    public function show_data_aplikasi_page()
    {
        return view('pustakawan_views.master_data.perpustakaan.data_aplikasi.index', [
            'title' => 'Data Aplikasi',
            'heading' => 'Data Aplikasi',
        ]);
    }

    public function show_data_perpustakaan_page()
    {
        return view('pustakawan_views.master_data.perpustakaan.data_perpustakaan.index', [
            'title' => 'Data Perpustakaan',
            'heading' => 'Data Perpustakaan',
        ]);
    }
}
