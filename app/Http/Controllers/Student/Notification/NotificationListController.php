<?php

namespace App\Http\Controllers\Student\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;

class NotificationListController extends Controller
{
    public function showNotificationPage()
    {
        $title = 'Notifikasi Masuk';
        $notifications = Notification::with('receiver')->where('penerima_id', auth()->user()->id)->limit(10)->get();

        return view('student-pages.notification.notification-list', compact('title', 'notifications'));
    }

    public function showReadNotificationPage($id)
    {
        $data = Notification::findOrFail($id);
        $title = "Baca Notifikasi Dari {$data->sender->nama}";

        if ($data->status == 'Belum dibaca') {
            $this->log("{$data->receiver->nama} membaca notifikasi yang dikirimkan oleh {$data->sender->nama}");
            $data->update(['status' => 'Sudah dibaca']);
        }

        return view('student-pages.notification.read-notification', compact('title', 'data'));
    }
}
