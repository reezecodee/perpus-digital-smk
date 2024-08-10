<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Borrower;
use App\Models\LikedBook;
use Illuminate\Http\Request;

class LogicBookController extends Controller
{
    public function update_like(Request $request, $id)
    {
        $request->validate([
            'like' => 'required|in:suka,batal',
        ]);

        $peminjamId = auth()->user()->id;

        if ($request->like == 'suka') {
            $credentials = [
                'buku_id' => $id,
                'peminjam_id' => $peminjamId
            ];

            LikedBook::firstOrCreate($credentials);
            return back();
        } else if ($request->like == 'batal') {
            $book = LikedBook::where('buku_id', $id)
                ->where('peminjam_id', $peminjamId)
                ->first();

            if ($book) {
                $book->delete();
                return back();
            }
        }

        return back();
    }

    public function delete_e_book($id)
    {
        $peminjamId = auth()->user()->id;

        Borrower::where('buku_id', $id)
            ->where('peminjam_id', $peminjamId)
            ->delete();

        return back()->withSuccess('Buku berhasil menghapus e-book');
    }
}
