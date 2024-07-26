<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show_overview_page()
    {
        return view('peminjam_views.profile.overview', [
            'title' => 'Overview Profile'
        ]);
    }
    
    public function show_history_page()
    {
        return view('peminjam_views.profile.riwayat', [
            'title' => 'Riwayat Peminjaman Buku'
        ]);
    }

    public function show_ch_password_page()
    {
        return view('peminjam_views.profile.ganti_password', [
            'title' => 'Ganti Password'
        ]);
    }
}
