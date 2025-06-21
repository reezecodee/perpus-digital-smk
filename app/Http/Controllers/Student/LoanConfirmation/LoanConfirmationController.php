<?php

namespace App\Http\Controllers\Student\LoanConfirmation;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;

class LoanConfirmationController extends Controller
{
    public function showConfirmationPage($id)
    {
        $book = Book::findOrFail($id);

        if ($book->format === 'Elektronik') {
            return back();
        }

        $title = "Konfirmasi Peminjaman Buku {$book->judul}";
        $data = $book;
        $shelves = $this->getBookShelves($id);

        return view('student-pages.book.loan-confirmation', compact('title', 'data', 'shelves'));
    }

    private function getBookShelves($bookId)
    {
        return Placement::where('buku_id', $bookId)
            ->with('shelf')
            ->get()
            ->groupBy('shelf.id')
            ->map(function ($group) {
                return [
                    'shelf' => $group->first()->shelf,
                    'placement' => $group->first(),
                ];
            })
            ->values();
    }

    public function showSuccessPage()
    {
        if (!session('success')) {
            return redirect()->route('show.homepage');
        }

        $title = 'Peminjaman Sukeses';

        return view('student-pages.book.success', compact('title'));
    }
}
