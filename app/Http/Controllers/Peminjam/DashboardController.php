<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        return view('peminjam_views.dashboard', [
            'title' => 'Dashboard E-Perpustakaan'
        ]);
    }
}
