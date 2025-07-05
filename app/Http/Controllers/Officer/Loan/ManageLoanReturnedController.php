<?php

namespace App\Http\Controllers\Officer\Loan;

use App\Http\Controllers\Controller;

class ManageLoanReturnedController extends Controller
{
    public function showReturnedLoan()
    {
        $title = 'Manajemen Pengembalian';
        $name = 'Overview';
        $pageTitle = 'Manajemen Pengembalian';

        return view('officer-pages.loan-management.return.index', compact('title', 'name', 'pageTitle'));
    }
}
