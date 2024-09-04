<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Placement;
use Illuminate\Http\Request;

class LoanConfirmation extends Controller
{
    public function show_confirm($id)
    {
        $book = Book::with('fine')->findOrFail($id);
        if ($book->format == 'Elektronik') {
            return back();
        }

        $placements = Placement::where('buku_id', $id)
            ->with('shelf') 
            ->get();

        $shelves = $placements->groupBy('shelf.id')->map(function ($group) {
            return [
                'shelf' => $group->first()->shelf, 
                'placement' => $group->first()     
            ];
        })->values();

        return view('borrower-pages.book.loan-confirmation', [
            'title' => 'Konfirmasi Peminjaman',
            'data' => Book::with('fine')->find($id),
            'shelves' => $shelves
        ]);
    }

    public function show_success()
    {
        return view('borrower-pages.book.success', [
            'title' => 'Peminjaman Sukses'
        ]);
    }
}
