<?php

namespace App\Http\Controllers\Peminjam\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function show_notification()
    {
        return view('peminjam_views.notifikasi.index', [
            'title' => 'Notifikasi Masuk',
            'notifications' => Notification::where('penerima_id', auth()->user()->id)->get()
        ]);
    }

    public function show_read_notif($id)
    {
        $data = Notification::find($id);

        if(!$data){
            return abort(404);
        }

        return view('peminjam_views.notifikasi.baca_notif', [
            'title' => 'Baca Notifikasi',
            'data' => $data,
        ]);
    }
}
