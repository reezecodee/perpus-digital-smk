<?php

namespace App\Http\Controllers\Peminjam\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LikedBook;
use App\Models\Review;
use Illuminate\Http\Request;

class BookDetail extends Controller
{
    public function show_book($id)
    {
        $data = Book::find($id);

        if (!$data) {
            return abort(404);
        }

        $is_liked = LikedBook::where('peminjam_id', auth()->user()->id)->where('buku_id', $id)->exists();

        $recomendations = Book::where('format', $data->format)
            ->available()
            ->where('id', '!=', $id)
            ->with('category')
            ->withAvg('review', 'rating')
            ->limit(12)
            ->latest()
            ->get();

        $rating = function ($id) {
            return number_format((float)Review::where('buku_id', $id)->avg('rating'), 1, '.', '');
        };

        return view('peminjam_views.buku.detail-buku', [
            'title' => 'Detail Buku',
            'data' => $data,
            'likes' => count(LikedBook::where('buku_id', $id)->get()),
            'reviews' => Review::with('borrower_review')->where('buku_id', $id)->get(),
            'rating' => $rating,
            'is_liked' => $is_liked,
            'recomendations' => $recomendations
        ]);
    }

    // Logical Backend Here...

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

            $liked_book = LikedBook::firstOrCreate($credentials);
            $this->log("Menyukai buku {$liked_book->book->judul}");
            return back();
        } else if ($request->like == 'batal') {
            $liked_book = LikedBook::where('buku_id', $id)
                ->where('peminjam_id', $peminjamId)
                ->first();

            if ($liked_book) {
                $this->log("Membatalkan suka buku {$liked_book->book->judul}");
                $liked_book->delete();
                return back();
            }
        }

        return back();
    }
}
