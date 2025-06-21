<?php

namespace App\Http\Controllers\Officer\Information;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\User;

class ManageNotificationController extends Controller
{
    public function showNotification()
    {
        $title = 'Manajemen Notifikasi';
        $name = 'Overview';
        $pageTitle = 'Manajemen Notifikasi';
        $type = 'btn-modal';
        $btnName = 'Buat Notifikasi';
        $students = User::role('Siswa')->where('status', 'Aktif')->latest()->get();

        return view('officer-pages.information-management.notification.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students'));
    }

    public function showDetailNotification($id)
    {
        $notification = Notification::findOrFail($id);

        $title = 'Detail Notifikasi';
        $name = 'Detail';
        $pageTitle = 'Detail Notifikasi';
        $type = 'btn-back';
        $btnName = 'Kembali';

        return view('officer-pages.information-management.notification.detail', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }
}
