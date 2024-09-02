<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class LoanConfirmation extends Controller
{
    public function show_confirm($id)
    {
        $book = Book::with('fine')->find($id);
        if($book->format == 'Elektronik'){
            return back();
        }

        return view('borrower-pages.book.loan-confirmation', [
            'title' => 'Konfirmasi Peminjaman',
            'data' => Book::with('fine')->find($id),
        ]);
    }

    public function show_success()
    {
        return view('borrower-pages.book.success', [
            'title' => 'Peminjaman Sukses'
        ]);
    }
}
