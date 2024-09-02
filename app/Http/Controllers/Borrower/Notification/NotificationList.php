<?php

namespace App\Http\Controllers\Borrower\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationList extends Controller
{
    public function show_notification()
    {
        return view('borrower-pages.notification.notification-list', [
            'title' => 'Notifikasi Masuk',
            'notifications' => Notification::with('receiver')->where('penerima_id', auth()->user()->id)->limit(10)->get()
        ]);
    }

    public function show_read_notif($id)
    {
        $data = Notification::findOrFail($id);
        if($data->status == 'Belum dibaca'){
            $this->log("{$data->receiver->nama} membaca notifikasi yang dikirimkan oleh {$data->sender->nama}");
            $data->update(['status' => 'Sudah dibaca']);
        }

        return view('borrower-pages.notification.read-notification', [
            'title' => 'Baca Notifikasi',
            'data' => $data,
        ]);
    }
}
