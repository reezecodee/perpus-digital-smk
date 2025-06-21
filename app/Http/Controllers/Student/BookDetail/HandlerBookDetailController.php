<?php

namespace App\Http\Controllers\Student\BookDetail;

use App\Http\Controllers\Controller;
use App\Models\LikedBook;
use Illuminate\Http\Request;

class HandlerBookDetailController extends Controller
{
    public function updateBookLike(Request $request, $id)
    {
        $request->validate([
            'like' => 'required|in:suka,batal',
        ]);

        $peminjamId = auth()->user()->id;
        $credentials = ['buku_id' => $id, 'peminjam_id' => $peminjamId];

        if ($request->like === 'suka') {
            $likedBook = LikedBook::firstOrCreate($credentials);
            $this->log("Menyukai buku {$likedBook->book->judul}");
        } elseif ($request->like === 'batal') {
            $likedBook = LikedBook::where($credentials)->first();

            if ($likedBook) {
                $this->log("Membatalkan suka buku {$likedBook->book->judul}");
                $likedBook->delete();
            }
        }

        return back();
    }
}
