<?php

namespace App\Http\Controllers\Borrower\Book;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\LoanRequest;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Placement;
use App\Models\Shelf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LoanConfirmation extends Controller
{
    public function show_confirm($id)
    {
        $book = Book::findOrFail($id);
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
            'data' => $book,
            'shelves' => $shelves
        ]);
    }

    public function show_success()
    {
        return view('borrower-pages.book.success', [
            'title' => 'Peminjaman Sukses'
        ]);
    }

    // Logical Backend Here...

    public function create_loan(LoanRequest $request)
    {
        $validated_data = $request->validated();

        $transaction = DB::transaction(function () use ($validated_data) {
            $placement = Placement::where('id', $validated_data['penempatan_id'])
                ->lockForUpdate()
                ->first();

            if (!$placement) {
                return 'Penempatan tidak ditemukan.';
            }

            $shelf = $placement->shelf;
            $book = $placement->book;

            if (!$shelf) {
                return 'Rak tidak ditemukan.';
            }

            if (!$book || $book->status === 'Tidak tersedia') {
                return 'Buku tidak tersedia.';
            }

            if ($placement->buku_saat_ini <= 0) {
                return 'Stok buku habis.';
            }

            $placement->buku_saat_ini--;
            $placement->save();

            $validated_data['peminjam_id'] = auth()->user()->id;

            Loan::create($validated_data);

            return 'Peminjaman berhasil.';
        });

        if ($transaction === 'Peminjaman berhasil.') {
            return redirect()->route('show_success')->withSuccess($transaction);
        } else {
            return redirect()->back()->with('error', $transaction);
        }
    }
}
