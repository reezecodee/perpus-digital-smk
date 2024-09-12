<?php

namespace App\Http\Controllers\Borrower\Payment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\FinePayment;
use App\Models\Loan;
use Illuminate\Http\Request;

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
        $title = "Pembayaran Denda Buku {$data->placement->book->judul}";

        return view('borrower-pages.payment.fine-payment', compact('title', 'data'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman list riwayar pembayaran denda.
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
        $title = "Detail Pembayaran Denda Buku {$finePayment->loan->placement->book->judul}";

        return view('borrower-pages.payment.detail-payment', compact('title', 'finePayment'));
    }


    /**
     * Function ini digunakan untuk menampilkan halaman detail pembayaran yang sudah dilakukan.
     *
     */

    public function showTutorialPage()
    {
        $title = "Tutorial Pembayaran Denda";

        return view('borrower-pages.payment.tutorial-payment', compact('title'));
    }
}
