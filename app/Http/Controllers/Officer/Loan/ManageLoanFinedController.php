<?php

namespace App\Http\Controllers\Officer\MasterDataLoan;

use App\Http\Controllers\Controller;

class ManageLoanFinedController extends Controller
{
    public function showLoanFined()
    {
        $title = 'Peminjam Terkena Denda';
        $name = 'Overview';
        $pageTitle = 'Peminjam Terkena Denda';
        $type = 'btn-modal';
        $btnName = 'Tambah Denda';

        return view('officer-pages.loan-management.fine.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }

    public function showPaymentLoanFined()
    {
        $title = 'Pembayaran Denda';
        $name = 'Overview';
        $pageTitle = 'Pembayaran Denda';
        $type = '';
        $btnName = 'Tambah Denda';

        return view('officer-pages.loan-management.fine-payment.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }
}
