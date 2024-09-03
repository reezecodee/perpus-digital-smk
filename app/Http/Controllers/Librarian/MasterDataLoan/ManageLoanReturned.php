<?php

namespace App\Http\Controllers\Librarian\MasterDataLoan;

use App\Http\Controllers\Controller;
use App\Models\Loan;
use Illuminate\Http\Request;

class ManageLoanReturned extends Controller
{
    public function show_data_pengembali()
    {
        $ucfirst_filter = ucfirst(request('filter'));
        $status = ['Sudah dikembalikan', 'Sudah diulas'];

        if ($ucfirst_filter && !in_array($ucfirst_filter, $status)) {
            abort(404); 
        }

        $borrowersQuery = Loan::query();

        if ($ucfirst_filter) {
            $borrowersQuery->where('status', $ucfirst_filter);
        } else {
            $borrowersQuery->whereIn('status', $status);
        }

        $borrowers = $borrowersQuery->latest()->get();

        return view('librarian-pages.master-data.loan-management.loan.index', [
            'title' => 'Data Pengembalian Buku',
            'heading' => 'Pengembalian Buku',
            'borrowers' => $borrowers
        ]);
    }
}
