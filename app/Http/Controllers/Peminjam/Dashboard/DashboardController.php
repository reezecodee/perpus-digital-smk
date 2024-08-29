<?php

namespace App\Http\Controllers\Peminjam\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Review;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        $recomendationsBooks = Book::available()->physical()
            ->with('category')
            ->withAvg('review', 'rating')
            ->limit(12)
            ->latest()
            ->get();

        $latestEbooks = Book::available()->electronic()
            ->with('category')
            ->withAvg('review', 'rating') 
            ->limit(12)
            ->latest()
            ->get();


        return view('peminjam_views.dashboard', [
            'title' => 'Dashboard E-Perpustakaan',
            'recomendations' => $recomendationsBooks,
            'latest_ebooks' => $latestEbooks
        ]);
    }
}
