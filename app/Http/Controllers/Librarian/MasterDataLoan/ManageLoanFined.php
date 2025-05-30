<?php

namespace App\Http\Controllers\Librarian\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class ManageLoanFined extends Controller
{
    public function show_data_terkena_denda()
    {
        // $ucfirst_filter = ucfirst(request('filter'));
        // $status = ['Sudah dibayar', 'Terkena denda', 'Menunggu konfirmasi pembayaran'];

        // if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
        //     abort(404); 
        // }

        // $borrowersQuery = Loan::query();

        // if ($ucfirst_filter) {
        //     $borrowersQuery->where('status', $ucfirst_filter);
        // } else {
        //     $borrowersQuery->whereIn('status', $status);
        // }

        // $borrowers = $borrowersQuery->latest()->get();

        // return view('librarian-pages.master-data.loan-management.loan.index', [
        //     'title' => 'Data Terkena Denda',
        //     'heading' => 'Peminjam Terkena Denda',
        //     'borrowers' => $borrowers
        // ]);

        $title = 'Peminjam Terkena Denda';
        $name = 'Overview';
        $pageTitle = 'Peminjam Terkena Denda';
        $type = 'btn-modal';
        $btnName = 'Tambah Denda';

        return view('test_views.loan-management.fine.index', compact('title', 'name', 'pageTitle', 'type', 'btnName'));
    }
}
