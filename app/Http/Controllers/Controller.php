<?php

namespace App\Http\Controllers;

use App\Models\LogActivity;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $user;

    public function __construct()
    {
        Carbon::setLocale('id');

        $this->middleware(function ($request, $next) {
            $this->user = auth()->user(); // Inisialisasi user setelah middleware dijalankan

            return $next($request);
        });
    }

    protected function log($action)
    {
        $credentials = [
            'user_id' => auth()->user()->id,
            'keterangan' => $action
        ];
        LogActivity::create($credentials);
    }
}
