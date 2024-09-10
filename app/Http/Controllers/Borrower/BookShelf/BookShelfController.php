<?php

namespace App\Http\Controllers\Borrower\BookShelf;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Review;

class BookShelfController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan rak buku user yang berisi Buku, E-book, dan Review.
     * 
     */

    public function showMyBookShelfPage()
    {
        $userId = $this->user->id;
        $excludedStatuses = ['Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'];

        $books = $this->getBooksByFormat($userId, 'Fisik', $excludedStatuses);
        $eBooks = $this->getBooksByFormat($userId, 'Elektronik');
        $forReviews = $this->getBooksForReview($userId);
        $reviews = $this->getReviewsByBorrower($userId);

        $title = 'Rak Buku Saya';

        return view(
            'borrower-pages.book.book-shelf',
            compact('title', 'books', 'eBooks', 'forReviews', 'reviews')
        );
    }


    /**
     * Ambil data buku berdasarkan format.
     * @param $userId -> berisi ID user saat ini
     * @param $format -> format buku yang akan diambil
     * @param $excludedStatues -> status peminjaman yang dikecualikan
     */

    private function getBooksByFormat($userId, $format, $excludedStatuses = [])
    {
        return Loan::with(['placement.book'])
            ->where('peminjam_id', $userId)
            ->when($excludedStatuses, fn($query) => $query->whereNotIn('status', $excludedStatuses))
            ->whereHas('placement.book', fn($query) => $query->where('format', $format))
            ->get();
    }


    /**
     * Ambil data buku berdasarkan format.
     * @param $userId -> berisi ID user saat ini
     * @param $format -> format buku yang akan diambil
     * @param $excludedStatues -> status peminjaman yang dikecualikan
     */

    private function getBooksForReview($userId)
    {
        return Loan::with(['placement.book'])
            ->where('peminjam_id', $userId)
            ->where('status', 'Sudah dikembalikan')
            ->get();
    }


    /**
     * Ambil data review berdasarkan peminjam saat ini.
     * @param $userId -> berisi ID user saat ini
     */

    private function getReviewsByBorrower($userId)
    {
        return Review::with('borrower')->where('peminjam_id', $userId)->get();
    }
}
