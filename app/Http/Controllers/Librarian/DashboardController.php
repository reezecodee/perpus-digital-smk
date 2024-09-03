<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        return view('librarian-pages.dashboard', [
            'title' => 'Dashboard Control E-Perpustakaan',
            'heading' => 'Dashboard'
        ]);
    }
}
