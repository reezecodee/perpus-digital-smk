<?php

namespace App\Http\Controllers\Student\BookShelf;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use App\Models\Review;
use Picqer\Barcode\BarcodeGeneratorPNG;

class BookShelfController extends Controller
{
    public function showMyBookShelfPage()
    {
        $userId = $this->user->id;
        $excludedStatuses = ['Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas'];

        $books = $this->getBooksByFormat($userId, 'Fisik', $excludedStatuses);
        $eBooks = $this->getBooksByFormat($userId, 'Elektronik');
        $forReviews = $this->getBooksForReview($userId);
        $reviews = $this->getReviewsByBorrower($userId);
        $barcode = function ($code, $scale = 1, $height = 40) {
            $generator = new BarcodeGeneratorPNG();
            $image = $generator->getBarcode($code, $generator::TYPE_CODE_128, $scale, $height);
            return '<img src="data:image/png;base64,' . base64_encode($image) . '">';
        };

        $title = 'Rak Buku Saya';

        return view(
            'student-pages.book.book-shelf',
            compact('title', 'books', 'eBooks', 'forReviews', 'reviews', 'barcode')
        );
    }

    private function getBooksByFormat($userId, $format, $excludedStatuses = [])
    {
        return Loan::with(['placement.book', 'book'])
            ->where('peminjam_id', $userId)
            ->when($excludedStatuses, fn($query) => $query->whereNotIn('status', $excludedStatuses))
            ->whereHas('book', fn($query) => $query->where('format', $format))
            ->get();
    }

    private function getBooksForReview($userId)
    {
        return Loan::with(['placement.book'])
            ->where('peminjam_id', $userId)
            ->where('status', 'Sudah dikembalikan')
            ->get();
    }

    private function getReviewsByBorrower($userId)
    {
        return Review::with('borrower_review')->where('peminjam_id', $userId)->get();
    }
}
