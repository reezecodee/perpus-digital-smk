<?php

namespace App\Http\Controllers\Officer\Loan;

use App\Http\Controllers\Controller;
use App\Http\Requests\Loan\Officer\OfficerLoanRequest;
use App\Models\Loan;
use App\Repositories\Logger\ActivityLogger;
use App\Services\Loan\LoanService;

class HandlerLoanController extends Controller
{
    protected $activityLogger;
    protected $loanService;

    public function __construct(ActivityLogger $activityLogger, LoanService $loanService)
    {
        $this->activityLogger = $activityLogger;
        $this->loanService = $loanService;
    }

    public function storeLoan(OfficerLoanRequest $request)
    {
        $validatedData = $request->validated();
        $validatedData['kode_peminjaman'] = $this->loanService->generateLoanCode();
        $validatedData['keterangan_denda'] = 'Tidak ada';

        $loan = Loan::create($validatedData);

        $message = "Memberikan izin peminjaman buku \"{$loan->book->judul}\" kepada {$loan->peminjam->nama}";
        $this->activityLogger->saveLog($message);

        return redirect()->route('data_perpinjaman')->withSuccess('Berhasil menambahkan peminjaman baru');
    }

    public function updateLoan(OfficerLoanRequest $request, $id)
    {
        $validatedData = $request->validated();

        $loan = Loan::findOrFail($id);
        $loan->update($validatedData);

        $message = 'Memperbarui data peminjaman';
        $this->activityLogger->saveLog($message);

        return back()->withSuccess('Berhasil memperbarui data peminjaman');
    }
}
