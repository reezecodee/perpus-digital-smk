<?php

namespace App\Http\Controllers\Borrower\Payment;

use App\Helpers\TripayHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Book;
use App\Models\Fine;
use App\Models\FinePayment;
use App\Models\Loan;
use Illuminate\Http\Request;

class HandlerFinePaymentController extends Controller
{
    public function createFinePayment(Request $request, $loanId)
    {
        $loan = Loan::findOrFail($loanId);
        $fine = Fine::where('buku_id', $loan->buku_id)->first();
        $merchatRef = 'SIPDSMK-' . time() . rand(100, 999);

        if ($loan->keterangan_denda == 'Denda buku rusak') {
            $amount = $fine->denda_rusak;
        } else if ($loan->keterangan_denda == 'Denda buku terlambat') {
            $amount = $fine->denda_tidak_kembali;
        } else {
            $amount = $fine->denda_terlambat;
        }

        $tripay = new TripayHelper();
        $sendRequest = $tripay->sendRequest('transaction/create', 'POST', [
            'method'         => $request->input('method'),
            'merchant_ref'   => $merchatRef,
            'amount'         => $amount,
            'customer_name'  => auth()->user()->nama,
            'customer_email' => auth()->user()->email,
            'customer_phone' => auth()->user()->telepon,
            'order_items'    => [
                [
                    'name'        => $loan->book->judul,
                    'price'       => $amount,
                    'quantity'    => 1,
                ],
            ],
            'return_url'   => 'http://127.0.0.1:8000/detail-pembayaran-denda/9f10a3c6-5fea-4f95-893e-92675bb85bdd',
            'expired_time' => (time() + (24 * 60 * 60)),
            'signature'    => $tripay->generateSignature($merchatRef, $amount),
        ]);

        $finePayment = FinePayment::create([
            'peminjam_id' => auth()->user()->id,
            'peminjaman_id' => $loan->id,
            'no_reference' => $sendRequest['reference'],
            'amount' => $sendRequest['amount'],
        ]);

        return redirect()->route('show.detailPayment', $finePayment->id);
    }
}
