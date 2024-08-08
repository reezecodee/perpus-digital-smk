<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
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
        $histories = Borrower::where('peminjam_id', auth()->user()->id)->whereNotIn('status', ['Terkena denda', 'Sudah dibayarkan'])->get();
        $fine_histories = Borrower::where('peminjam_id', auth()->user()->id)->whereIn('status', ['terkena denda', 'sudah dibayarkan'])->get();

        return view('peminjam_views.profile.riwayat', [
            'title' => 'Riwayat Peminjaman Buku',
            'histories' => $histories,
            'fine_histories' => $fine_histories,
        ]);
    }

    public function show_ch_password()
    {
        return view('peminjam_views.profile.ganti_password', [
            'title' => 'Ganti Password'
        ]);
    }

    public function show_overview_pustakawan()
    {
        return view('pustakawan_views.profile.overview', [
            'title' => 'Overview Profile Pustakawan',
            'heading' => 'Overview Profile',
        ]);
    }

    public function show_ch_pustakawan_pw()
    {
        return view('pustakawan_views.profile.ganti_password', [
            'title' => 'Ganti Password',
            'heading' => 'Ganti Password',
        ]);
    }
}
