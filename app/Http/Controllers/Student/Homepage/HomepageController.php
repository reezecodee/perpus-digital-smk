<?php

namespace App\Http\Controllers\Student\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Carousel;
use App\Models\Placement;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function showHomepage()
    {
        $title = 'Homepage E-Perpustakaan';
        $recommendations = $this->getRecommendationBooks();
        $latestEbooks = $this->getLatestEbooks();
        $carousels = $this->getCarousels();

        return view(
            'student-pages.homepage',
            compact('title', 'recommendations', 'latestEbooks', 'carousels')
        );
    }

    private function getRecommendationBooks()
    {
        return Book::available()->physical()
            ->with('category')
            ->withAvg('review', 'rating')
            ->addSelect([
                'totalBooksAvailable' => Placement::select(DB::raw('SUM(buku_saat_ini)'))
                    ->whereColumn('buku_id', 'books.id')
            ])
            ->limit(12)
            ->latest()
            ->get();
    }

    private function getLatestEbooks()
    {
        return Book::available()->electronic()
            ->with('category')
            ->withAvg('review', 'rating')
            ->limit(12)
            ->latest()
            ->get();
    }

    private function getCarousels()
    {
        return Carousel::all();
    }
}
