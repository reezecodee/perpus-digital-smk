<?php

namespace App\Http\Controllers\Pustakawan\MasterDataPerpustakaan;

use App\Http\Controllers\Controller;
use App\Models\Application;
use App\Models\Library;
use Illuminate\Http\Request;

class PerpustakaanController extends Controller
{
    public function show_data_aplikasi()
    {
        return view('pustakawan_views.master_data.perpustakaan.data_aplikasi.index', [
            'title' => 'Data Aplikasi',
            'heading' => 'Data Aplikasi',
            'data' => Application::first()
        ]);
    }

    public function show_data_perpus()
    {
        return view('pustakawan_views.master_data.perpustakaan.data_perpustakaan.index', [
            'title' => 'Data Perpustakaan',
            'heading' => 'Data Perpustakaan',
            'data' => Library::first()
        ]);
    }
}
