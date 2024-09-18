<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showArticlePage()
    {
        $title = 'List artikel E-perpustakaan';
        $articles = $articles = Article::orderBy('created_at', 'desc')->limit(10)->get();

        return view('site_views.artikel.index', compact('title', 'articles'));
    }

    public function showReadArticlePage($id)
    {
        $article = Article::findOrFail($id);
        $title = "Baca Artikel {$article->judul}";

        return view('site_views.artikel.baca-artikel', compact('title', 'article'));
    }

    public function showCropPicturePage()
    {
        $title = 'Crop & Resize Picture';

        return view('site_views.crop-picture', compact('title'));
    }

}
