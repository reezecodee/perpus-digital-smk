<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show_overview()
    {
        return view('peminjam_views.profile.overview', [
            'title' => 'Overview Profile'
        ]);
    }
    
    public function show_history()
    {
        return view('peminjam_views.profile.riwayat', [
            'title' => 'Riwayat Peminjaman Buku'
        ]);
    }

    public function show_ch_password()
    {
        return view('peminjam_views.profile.ganti_password', [
            'title' => 'Ganti Password'
        ]);
    }

    public function show_overview_pustakawan_page()
    {
        return view('pustakawan_views.profile.overview', [
            'title' => 'Overview Profile Pustakawan',
            'heading' => 'Overview Profile',
        ]);
    }

    public function show_ch_pustakawan_pw_page()
    {
        return view('pustakawan_views.profile.ganti_password', [
            'title' => 'Ganti Password',
            'heading' => 'Ganti Password',
        ]);
    }
}
