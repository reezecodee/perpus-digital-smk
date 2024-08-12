<?php

namespace App\Http\Controllers\Pustakawan\Profile;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PustakawanProfileController extends Controller
{
    public function show_overview_profile() 
    {
        return view('pustakawan_views.profile.overview', [
            'title' => 'Overview Profile',
            'heading' => 'Overview Profile'
        ]);
    }
}
