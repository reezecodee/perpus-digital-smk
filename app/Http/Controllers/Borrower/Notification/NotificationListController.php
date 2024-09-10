<?php

namespace App\Http\Controllers\Borrower\Notification;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\Request;

class NotificationListController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman list notifikasi yang masuk.
     * 
     */

    public function showNotificationPage()
    {
        $title = 'Notifikasi Masuk';
        $notifications = Notification::with('receiver')->where('penerima_id', auth()->user()->id)->limit(10)->get();

        return view('borrower-pages.notification.notification-list', compact('title', 'notifications'));
    }


    /**
     * Function ini digunakan untuk menampilkan data/membaca notifikasi yang dikirimkan.
     * 
     */

    public function showReadNotificationPage($id)
    {
        $data = Notification::findOrFail($id);
        $title = "Baca Notifikasi Dari {$data->sender->nama}";

        if ($data->status == 'Belum dibaca') {
            $this->log("{$data->receiver->nama} membaca notifikasi yang dikirimkan oleh {$data->sender->nama}");
            $data->update(['status' => 'Sudah dibaca']);
        }

        return view('borrower-pages.notification.read-notification', compact('title', 'data'));
    }
}
