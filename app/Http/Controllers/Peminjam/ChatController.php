<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show_chat()
    {
        return view('peminjam_views.chat', [
            'title' => 'Chat E-Perpustakaan',
            'chat_bubble' => false
        ]);
    }
}
