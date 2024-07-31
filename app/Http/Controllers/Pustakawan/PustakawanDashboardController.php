<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PustakawanDashboardController extends Controller
{
    public function show_dashboard()
    {
        return view('pustakawan_views.dashboard', [
            'title' => 'Dashboard E-Perpustakaan',
            'heading' => 'Dashboard'
        ]);
    }
}
