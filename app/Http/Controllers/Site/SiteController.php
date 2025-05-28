<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function showCropPicturePage()
    {
        $title = 'Crop & Resize Picture';

        return view('site_views.crop-picture', compact('title'));
    }

}
