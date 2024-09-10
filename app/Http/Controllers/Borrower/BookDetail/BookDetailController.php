<?php

namespace App\Http\Controllers\Borrower\BookDetail;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LikedBook;
use App\Models\Placement;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookDetailController extends Controller
{
    /**
     * Function digunankan untuk menampilkan halaman detail buku.
     * @param $id -> ID buku yang dikirim melalui parameter URL.
     */

    public function showBookDetailPage($id)
    {
        $book = Book::findOrFail($id);
        $userId = $this->user->id;

        $isLiked = LikedBook::where('peminjam_id', $userId)->where('buku_id', $id)->exists();
        $likesCount = LikedBook::where('buku_id', $id)->count();
        $reviews = Review::with('loan')->where('buku_id', $id)->get();

        // Buat rata-rata rating buku.
        $averageRating = number_format((float)Review::where('buku_id', $id)->avg('rating'), 1, '.', '');

        // Ambil data buku rekomendasi dengan kategori serupa.
        $recommendations = $this->getRecommendWithSameCategory($id, $book);

        $title = "Detail buku {$book->judul}";

        return view(
            'borrower-pages.book.book-detail',
            compact(
                'title',
                'book',
                'likesCount',
                'reviews',
                'averageRating',
                'isLiked',
                'recommendations'
            )
        );
    }


    /**
     * Ambil rekomendasi buku berdasarkan kategori yang sama.
     * @param $id -> ID buku.
     * @param $book -> Object buku.
     */
    private function getRecommendWithSameCategory($id, $book)
    {
        return Book::where('format', $book->format)
            ->available()
            ->where('id', '!=', $id)
            ->with('category')
            ->withAvg('review', 'rating')
            ->addSelect([
                'total_books_available' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
            ->limit(12)
            ->latest()
            ->get();
    }
}
