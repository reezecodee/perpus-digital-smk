<?php

namespace App\Http\Controllers\Borrower\LoanConfirmation;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\LoanRequest;
use App\Models\Loan;
use App\Models\Placement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HandlerLoanConfirmationController extends Controller
{
    public function createLoan(LoanRequest $request)
    {
        $validatedData = $request->validated();

        $transactionResult = DB::transaction(function () use ($validatedData) {
            return $this->processLoanTransaction($validatedData);
        });

        return $this->handleLoanResponse($transactionResult);
    }


    private function processLoanTransaction(array $validatedData)
    {
        $placement = $this->getPlacementWithLock($validatedData['penempatan_id']);

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

        // mengurangi stok buku yang tersedia
        $this->decrementBookStock($placement);

        $validatedData['peminjam_id'] = auth()->user()->id;
        $validatedData['buku_id'] = $book->id;
        Loan::create($validatedData);

        $this->log("Melakukan pengajuan peminjaman buku berjudul \"{$book->judul}\"");

        return 'Peminjaman berhasil.';
    }


    private function getPlacementWithLock($placementId)
    {
        return Placement::where('id', $placementId)
            ->lockForUpdate()
            ->first();
    }


    private function decrementBookStock(Placement $placement)
    {
        $placement->buku_saat_ini--;
        $placement->save();
    }


    private function handleLoanResponse($transactionResult)
    {
        if ($transactionResult === 'Peminjaman berhasil.') {
            return redirect()
                ->route('show.success')
                ->withSuccess('Peminjaman sukses, terimakasih sudah menggunakan layanan kami');
        }

        return redirect()
            ->back()
            ->with('error', $transactionResult);
    }
}
