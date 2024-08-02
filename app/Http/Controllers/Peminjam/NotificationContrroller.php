<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationContrroller extends Controller
{
    public function show_notification()
    {
        return view('peminjam_views.notifikasi', [
            'title' => 'Notifikasi Masuk',
            'notifications' => Notification::where('penerima_id', auth()->user()->id)
        ]);
    }

    public function show_read_notif($id)
    {
        return view('peminjam_views.baca_notif', [
            'title' => 'Baca Notifikasi',
            'data' => Notification::find($id),
        ]);
    }
}
