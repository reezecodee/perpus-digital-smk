<?php

namespace App\Http\Controllers\Borrower\Payment;

use App\Http\Controllers\Controller;
use App\Models\FinePayment;
use App\Models\Loan;
use Illuminate\Http\Request;
use App\Helpers\TripayHelper;
use Illuminate\Support\Facades\Response;

class FinePaymentController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman pembayran denda.
     * @param $id -> berisi ID Loan
     *
     */

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

        return view('borrower-pages.payment.fine-payment', compact('title', 'data', 'payments', 'createNewPayment', 'finePayment'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman list riwayat pembayaran denda.
     *
     */

    public function showPaymentHistoriesPage()
    {
        $paymentHistories = FinePayment::where('peminjam_id', auth()->user()->id)->get();
        $title = 'Riwayat Pembayaran';

        return view('borrower-pages.payment.payment-histories', compact('title', 'paymentHistories'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman detail pembayaran yang sudah dilakukan.
     *
     */

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

        // dd($detailPayment);

        return view('borrower-pages.payment.detail-payment', compact('title', 'finePayment', 'detailPayment', 'logo', 'loan'));
    }
}
