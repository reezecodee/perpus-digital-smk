<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function show_login()
    {
        return view('auth.login', [
            'title' => 'Login ke E-Perpustakaan'
        ]);
    }
}
