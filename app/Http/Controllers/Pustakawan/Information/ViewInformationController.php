<?php

namespace App\Http\Controllers\Pustakawan\Information;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ViewInformationController extends Controller
{
    public function show_create_notif_page()
    {
        return view('pustakawan_views.informasi.buat_notifikasi', [
            'title' => 'Buat Notifikasi',
            'heading' => 'Buat Notifikasi'
        ]);
    }

    public function show_send_email_page()
    {
        return view('pustakawan_views.informasi.kirim_email', [
            'title' => 'Kirim Email',
            'heading' => 'Kirim Email'
        ]);
    }

    public function show_create_article_page()
    {
        return view('pustakawan_views.informasi.buat_artikel', [
            'title' => 'Buat Artikel',
            'heading' => 'Buat Artikel'
        ]);
    }
    public function show_set_calendar_page()
    {
        return view('pustakawan_views.informasi.atur_kalender', [
            'title' => 'Atur Kalender',            
            'heading' => 'Atur Kalender',
        ]);
    }
}
