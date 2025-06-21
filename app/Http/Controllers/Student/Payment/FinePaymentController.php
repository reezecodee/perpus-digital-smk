<?php

namespace App\Http\Controllers\Student\Payment;

use App\Http\Controllers\Controller;
use App\Models\FinePayment;
use App\Models\Loan;
use App\Helpers\TripayHelper;

class FinePaymentController extends Controller
{
    public function showPaymentPage($id)
    {
        $data = Loan::findOrFail($id);
        $title = "Pembayaran Denda Buku {$data->book->judul}";
        $tripay = new TripayHelper();
        $payments = $tripay->sendRequest('merchant/payment-channel', 'GET', []);
        $payments = collect($payments)->groupBy('group');
        $finePayment = FinePayment::where('peminjaman_id', $data->id)->latest()->first();
        $createNewPayment = false;

        if (
            !$finePayment ||
            in_array($finePayment->status_bayar, ['REFUND', 'EXPIRED', 'FAILED'])
        ) {
            $createNewPayment = true;
        }

        return view('student-pages.payment.fine-payment', compact('title', 'data', 'payments', 'createNewPayment', 'finePayment'));
    }

    public function showPaymentHistoriesPage()
    {
        $paymentHistories = FinePayment::where('peminjam_id', auth()->user()->id)->get();
        $title = 'Riwayat Pembayaran';

        return view('student-pages.payment.payment-histories', compact('title', 'paymentHistories'));
    }

    public function showDetailPaymentPage($id)
    {
        $finePayment = FinePayment::findOrFail($id);
        $loan = Loan::findOrFail($finePayment->peminjaman_id);
        $title = "Detail Pembayaran Denda Buku";
        $tripay = new TripayHelper();
        $detailPayment = $tripay->sendRequest('transaction/detail', 'GET', [
            'reference' => $finePayment->no_reference
        ]);
        $logo = $tripay->sendRequest('merchant/payment-channel', 'GET', [
            'code' => $detailPayment['payment_method']
        ])[0]['icon_url'];

        return view('student-pages.payment.detail-payment', compact('title', 'finePayment', 'detailPayment', 'logo', 'loan'));
    }
}
