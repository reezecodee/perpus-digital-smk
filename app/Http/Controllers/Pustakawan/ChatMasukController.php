<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatMasukController extends Controller
{
    public function show_chat_page()
    {
        return view('pustakawan_views.chat_masuk', [
            'title' => 'Chat Masuk E-Perpustakaan',
        ]);
    }
}
