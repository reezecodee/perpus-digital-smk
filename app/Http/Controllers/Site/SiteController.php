<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function article() 
    {
        return view('site_views.artikel', [
            'title' => 'List artikel E-perpustakaan'
        ]);
    }
}
