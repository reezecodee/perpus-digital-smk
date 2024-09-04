<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckPendingLoanStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = Auth::user();

        $pendingLoan = $user->loan()->where('status', 'Menunggu persetujuan')->exists();
        $loanWithFine = $user->loan()->where('status', 'Terkena denda')->exists();

        if ($pendingLoan) {
            return abort(403, 'Anda tidak dapat meminjam buku lagi sampai peminjaman sebelumnya disetujui.');
        }

        if ($loanWithFine) {
            return abort(403, 'Anda tidak dapat meminjam buku lagi sampai denda peminjaman sebelumnya dibayarkan.');
        }

        return $next($request);
    }
}
