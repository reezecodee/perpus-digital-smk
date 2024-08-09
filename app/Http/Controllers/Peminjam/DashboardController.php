<?php

namespace App\Http\Controllers\Peminjam;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function show_dashboard()
    {
        $recommendedBooks = Book::available()->physical()
        ->withCount('borrower') // Menghitung jumlah peminjaman
        ->withAvg('review', 'rating') // Menghitung rata-rata rating
        // ->having('borrowers_count', '>', 0) // Pastikan buku telah dipinjam setidaknya sekali
        // ->orderBy('borrowers_count', 'desc') // Urutkan berdasarkan jumlah peminjaman
        // ->orderBy('reviews_avg_rating', 'desc') // Urutkan berdasarkan rata-rata rating
        ->limit(12)
        ->get();

        return view('peminjam_views.dashboard', [
            'title' => 'Dashboard E-Perpustakaan',
            'recomendations' => $recommendedBooks
        ]);
    }
}
