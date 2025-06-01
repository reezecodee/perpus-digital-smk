<?php

namespace App\Http\Controllers\Librarian\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class ManageLoanReturned extends Controller
{
    public function show_data_pengembali()
    {
        $title = 'Manajemen Pengembalian';
        $name = 'Overview';
        $pageTitle = 'Manajemen Pengembalian';

        return view('test_views.loan-management.return.index', compact('title', 'name', 'pageTitle'));
    }
}
