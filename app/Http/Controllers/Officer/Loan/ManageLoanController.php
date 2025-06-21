<?php

namespace App\Http\Controllers\Officer\Loan;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use App\Models\Placement;
use App\Models\User;

class ManageLoanController extends Controller
{
    public function showLoan()
    {
        $title = 'Manajemen Peminjaman';
        $name = 'Overview';
        $pageTitle = 'Manajemen Peminjaman';
        $type = 'btn-modal';
        $btnName = 'Tambah Peminjaman';
        $students = User::role('Siswa')->where('status', 'Aktif')->get();
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();
        $placements = Placement::all();

        return view('officer-pages.loan-management.loan.index', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students', 'books', 'placements'));
    }

    public function showLoanEdit($id)
    {
        $title = 'Edit Peminjaman';
        $name = 'Edit';
        $pageTitle = 'Edit Peminjaman';
        $type = '';
        $btnName = 'Kembali';
        $loan = Loan::findOrFail($id);
        $students = User::role('Siswa')->where('status', 'Aktif')->get();
        $books = Book::where('status', 'Tersedia')->where('format', 'Fisik')->get();
        $placements = Placement::all();

        return view('officer-pages.loan-management.loan.edit', compact('title', 'name', 'pageTitle', 'type', 'btnName', 'students', 'books', 'placements', 'loan'));
    }

    public function showDetailLoan($id)
    {
        return view('librarian-pages.master-data.loan-management.loan.detail', [
            'title' => 'Detail Peminjam Buku',
            'heading' => 'Detail Peminjam Buku',
            'data' => Loan::where('id', $id)->first()
        ]);
    }
}
