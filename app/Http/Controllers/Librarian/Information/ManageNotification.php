<?php

namespace App\Http\Controllers\Librarian\Information;

use App\Http\Controllers\Controller;
use App\Http\Requests\Information\NotificationRequest;
use App\Models\Notification;
use App\Models\User;
use Illuminate\Http\Request;

class ManageNotification extends Controller
{
    public function show_create_notif()
    {
        $title = 'Manajemen Notifikasi';
        $name = 'Overview';
        $pageTitle = 'Manajemen Notifikasi';
        $type = 'btn-modal';
        $btnName = 'Buat Notifikasi';
        $students = User::role('Siswa')->get();

        return view('test_views.information-management.notification.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students'));
    }

    public function detail_notif($id)
    {
        $notification = Notification::findOrFail($id);

        $title = 'Detail Notifikasi';
        $name = 'Detail';
        $pageTitle = 'Detail Notifikasi';
        $type = 'btn-back';
        $btnName = 'Kembali';

        return view('test_views.information-management.notification.detail', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function send_notification(NotificationRequest $request)
    {
        $validation_data = $request->validated();
        $validation_data['pengirim_id'] = auth()->user()->id;
        $validation_data['tgl_pengiriman'] = date('Y-m-d');

        $notif = Notification::create($validation_data);
        $this->log("Mengirimkan notifikasi kepada {$notif->receiver->nama}");
        return back()->withSuccess('Berhasil mengirimkan notifikasi');
    }

    public function delete_notification($id)
    {
        $notification = Notification::findOrFail($id);
        $this->log("Menghapus notifikasi yang dikirimkan kepada {$notification->receiver->nama}");
        $notification->delete();
        return back()->withSuccess('Berhasil menghapus notifikasi');
    }
}
