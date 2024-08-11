<?php

namespace App\Http\Controllers\Peminjam\Chat;

use App\Http\Controllers\Controller;
use App\Models\Chat;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function show_chat_index()
    {
        return view('peminjam_views.chat.index', [
            'title' => 'Chat E-Perpustakaan',
            'chat_bubble' => false,
            'librarians' => User::role('Pustakawan')->get()
        ]);
    }

    public function show_chat($id)
    {
        $data = Chat::find($id);
        
        if(!$data){
            return abort(404);
        }

        return view('peminjam_views.chat.chat', [
            'title' => 'Chat Pustakawan',
            'chat_bubble' => false,
            'librarians' => User::role('Pustakawan')->get(),
        ]);
    }
}
