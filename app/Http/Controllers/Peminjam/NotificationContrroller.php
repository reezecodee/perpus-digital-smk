<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationContrroller extends Controller
{
    public function show_notification()
    {
        return view('peminjam_views.notifikasi', [
            'title' => 'Notifikasi Masuk'
        ]);
    }

    public function show_read_notif()
    {
        return view('peminjam_views.baca_notif', [
            'title' => 'Baca Notifikasi'
        ]);
    }
}
