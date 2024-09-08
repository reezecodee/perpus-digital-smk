<?php

namespace App\Http\Controllers\Borrower\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Book;
use App\Models\Carousel;
use App\Models\Placement;
use App\Models\Popup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Homepage extends Controller
{
    public function show_dashboard()
    {
        $recommendationsBooks = Book::available()->physical()
            ->with('category')
            ->withAvg('review', 'rating')
            ->addSelect([
                'total_books_available' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
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

        return view('borrower-pages.homepage', [
            'title' => 'Homepage E-Perpustakaan',
            'recommendations' => $recommendationsBooks,
            'latest_ebooks' => $latestEbooks,
            'popup_images' => Popup::orderBy('urutan_ke')->get(),
            'carousels' => Carousel::all(),
            'articles' => $new_articles
        ]);
    }
}
