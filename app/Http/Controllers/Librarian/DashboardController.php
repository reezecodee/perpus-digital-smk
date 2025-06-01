<?php

namespace App\Http\Controllers\Librarian;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Help;
use App\Models\Loan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        $title = 'Dashboard';
        $name = 'Overview';
        $pageTitle = 'Dashboard';
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $loan7DaysAgo = Loan::whereDate('created_at', '>=', $sevenDaysAgo)->count();
        $student7DaysAgo = User::role('Siswa')->whereDate('created_at', '>=', $sevenDaysAgo)->count();
        $book7DaysAgo = Book::where('format', 'Fisik')->whereDate('created_at', '>=', $sevenDaysAgo)->count();
        $help7DaysAgo = Help::whereDate('created_at', '>=', $sevenDaysAgo)->count();
        $totalStudentActive = User::role('Siswa')->where('status', 'Aktif')->count();
        $totalLibrarian = User::role('Pustakawan')->count();
        $totalEBook = Book::where('format', 'Elektronik')->count();
        $totalBook = Book::where('format', 'Fisik')->count();

        return view('test_views.dashboard', compact('title', 'name', 'pageTitle', 'loan7DaysAgo', 'student7DaysAgo', 'book7DaysAgo', 'help7DaysAgo', 'totalStudentActive', 'totalLibrarian', 'totalEBook', 'totalBook'));
    }
}
