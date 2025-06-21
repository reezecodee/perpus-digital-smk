<?php

namespace App\Http\Controllers\Officer\Profile;

use App\Http\Controllers\Controller;


class ManageProfileController extends Controller
{
    public function showProfile()
    {
        $title = 'Profile Saya';
        $name = 'Overview';
        $pageTitle = 'Profile Saya';

        return view('officer-pages.profile.index', compact('title', 'name', 'pageTitle'));
    }
}
