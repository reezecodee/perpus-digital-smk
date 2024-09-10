<?php

namespace App\Http\Controllers\Borrower\BookDetail;

use App\Http\Controllers\Controller;
use App\Models\LikedBook;
use Illuminate\Http\Request;

class HandlerBookDetailController extends Controller
{
    /**
     * Function digunkanan untuk memproses like buku yang dilakukan oleh user.
     * @param $id -> ID buku yang dikirim melalui parameter URL.
     * 
     */
    public function updateBookLike(Request $request, $id)
    {
        $request->validate([
            'like' => 'required|in:suka,batal',
        ]);

        $peminjamId = auth()->user()->id;
        $credentials = ['buku_id' => $id, 'peminjam_id' => $peminjamId];

        if ($request->like === 'suka') {
            // Jika user menyukai buku, maka simpan ke Database.
            $likedBook = LikedBook::firstOrCreate($credentials);
            $this->log("Menyukai buku {$likedBook->book->judul}");
        } elseif ($request->like === 'batal') {
            // Jika user membatalkan suka, maka hapus dari Database.
            $likedBook = LikedBook::where($credentials)->first();

            if ($likedBook) {
                $this->log("Membatalkan suka buku {$likedBook->book->judul}");
                $likedBook->delete();
            }
        }

        return back();
    }
}
