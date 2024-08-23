<?php

namespace App\Http\Controllers\Pustakawan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ChatMasukController extends Controller
{
    public function show_chat()
    {
        return view('pustakawan_views.chat-masuk', [
            'title' => 'Chat Masuk E-Perpustakaan',
            'heading' => 'Chat Masuk',
        ]);
    }
}
