<?php

namespace App\Http\Controllers\Pustakawan\MasterDataBuku;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagePlacement extends Controller
{
    public function show_placement(){
        return view('pustakawan_views.master_data.penempatan.index', [
            'title' => 'Penempatan Buku',
            'heading' => 'Penempatan Buku'
        ]);
    }
}
