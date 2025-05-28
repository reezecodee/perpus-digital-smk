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

class HomepageController extends Controller
{
    /**
     * Function ini digunakan untuk menampilkan halaman homepage user.
     *
     */

    public function showHomepage()
    {
        $title = 'Homepage E-Perpustakaan';
        $recommendations = $this->getRecommendationBooks();
        $latestEbooks = $this->getLatestEbooks();
        $popupImages = $this->getPopupImages();
        $carousels = $this->getCarousels();

        return view(
            'borrower-pages.homepage',
            compact('title', 'recommendations', 'latestEbooks', 'popupImages', 'carousels')
        );
    }


    /**
     * Mendapatkan buku rekomendasi yang tersedia dalam format fisik.
     */

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


    /**
     * Mendapatkan buku elektronik terbaru yang tersedia.
     */

    private function getLatestEbooks()
    {
        return Book::available()->electronic()
            ->with('category')
            ->withAvg('review', 'rating')
            ->limit(12)
            ->latest()
            ->get();
    }


    /**
     * Mendapatkan gambar popup yang diurutkan berdasarkan urutan.
     */

    private function getPopupImages()
    {
        return Popup::orderBy('urutan_ke')->get();
    }


    /**
     * Mendapatkan data carousel.
     */

    private function getCarousels()
    {
        return Carousel::all();
    }
}
