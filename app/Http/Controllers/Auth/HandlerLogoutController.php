<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Repositories\Logger\ActivityLogger;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HandlerLogoutController extends Controller
{
    protected $activityLogger;

    public function __construct(ActivityLogger $activityLogger)
    {
        $this->activityLogger = $activityLogger;
    }

    public function __invoke(Request $request)
    {
        if (auth()->check()) {
            $this->activityLogger->saveLog('Logout dari aplikasi perpustakaan');
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
