<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\NotificationRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class ManageNotification extends Controller
{
    public function show_create_notif()
    {
        return view('pustakawan_views.informasi.buat-notifikasi', [
            'title' => 'Buat Notifikasi',
            'heading' => 'Buat Notifikasi',
            'receivers' => User::role('Peminjam')->where('status', 'Aktif')->latest()->get(),
            'notifications' => Notification::where('pengirim_id', auth()->user()->id)->get(),
        ]);
    }

    public function send_notification(NotificationRequest $request)
    {
        $validation_data = $request->validated();
        $validation_data['pengirim_id'] = auth()->user()->id;
        $validation_data['tgl_pengiriman'] = date('Y-m-d');

        Notification::create($validation_data);
        return back()->withSuccess('Berhasil mengirimkan notifikasi');
    }
}
