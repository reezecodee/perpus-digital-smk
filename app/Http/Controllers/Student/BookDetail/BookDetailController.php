<?php

namespace App\Http\Controllers\Student\BookDetail;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\LikedBook;
use App\Models\Placement;
use App\Models\Review;
use Illuminate\Support\Facades\DB;

class BookDetailController extends Controller
{
    public function showBookDetailPage($id)
    {
        $book = Book::findOrFail($id);
        $userId = $this->user->id;

        $isLiked = LikedBook::where('peminjam_id', $userId)->where('buku_id', $id)->exists();
        $likesCount = LikedBook::where('buku_id', $id)->count();
        $reviews = Review::with('loan')->where('buku_id', $id)->get();

        $averageRating = number_format((float)Review::where('buku_id', $id)->avg('rating'), 1, '.', '');

        $recommendations = $this->getRecommendWithSameCategory($id, $book);
        $stock = Placement::where('buku_id', $id)->sum('buku_saat_ini');

        $title = "Detail buku {$book->judul}";

        return view(
            'student-pages.book.book-detail',
            compact(
                'title',
                'book',
                'likesCount',
                'reviews',
                'averageRating',
                'isLiked',
                'stock',
                'recommendations'
            )
        );
    }

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
