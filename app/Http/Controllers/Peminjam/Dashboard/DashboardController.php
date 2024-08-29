<?php

namespace App\Http\Controllers\Peminjam\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\Carousel;
use App\Models\Popup;
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

        $new_articles = Article::with('author')->where('visibilitas', 'Publik')->limit(10)->get();

        return view('peminjam_views.dashboard', [
            'title' => 'Dashboard E-Perpustakaan',
            'recomendations' => $recomendationsBooks,
            'latest_ebooks' => $latestEbooks,
            'popup_images' => Popup::orderBy('urutan_ke')->get(),
            'carousels' => Carousel::all(),
            'articles' => $new_articles
        ]);
    }
}
