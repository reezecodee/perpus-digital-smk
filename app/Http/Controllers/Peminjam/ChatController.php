<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show_chat()
    {
        return view('peminjam_views.chat', [
            'title' => 'Chat E-Perpustakaan',
            'chat_bubble' => false,
            'librarians' => User::role('Pustakawan')->get()
        ]);
    }
}
