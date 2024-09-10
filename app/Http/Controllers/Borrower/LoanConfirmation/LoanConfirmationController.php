<?php

namespace App\Http\Controllers\Borrower\LoanConfirmation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\LoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanConfirmationController extends Controller
{
    /**
     * Function ini digunkan untuk menampilkan halaman konfirmasi saat proses peminjaman.
     *
     */

    public function showConfirmationPage($id)
    {
        $book = Book::findOrFail($id);

        if ($book->format === 'Elektronik') {
            return back();
        }

        $title = "Konfirmasi Peminjaman Buku {$book->judul}";
        $data = $book;
        $shelves = $this->getBookShelves($id);

        return view('borrower-pages.book.loan-confirmation', compact('title', 'data', 'shelves'));
    }


    /**
     * Ambil buku dari penempatan rak buku.
     * @param $bookId -> berisi ID buku
     */

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


    /**
     * Function ini digunakan untuk menampilkan halaman success ketika proses peminjaman berhasil.
     *
     */

    public function showSuccessPage()
    {
        if (!session('success')) {
            return redirect()->route('show.homepage');
        }

        $title = 'Peminjaman Sukeses';

        return view('borrower-pages.book.success', compact('title'));
    }
}
