<?php

namespace App\Http\Controllers\Borrower\Profile;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreImageRequest;
use App\Http\Requests\Profile\UpdatePasswordRequest;
use App\Http\Requests\Profile\UpdatePeminjamRequest;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileBorrowerController extends Controller
{
    /**
     * Tiga function pertama untuk mengatur munculnya tampilan dari halaman blade.
     * 
     */
    
    public function showOverviewPage()
    {
        $title = 'Overview Profile';

        return view('borrower-pages.profile.overview', compact('title'));
    }

    public function showHistoryPage()
    {
        $userId = auth()->user()->id;

        $histories = $this->getLoanHistories($userId, ['Terkena denda', 'Sudah dibayar', 'E-book'], false);
        $fineHistories = $this->getLoanHistories($userId, ['Terkena denda', 'Sudah dibayarkan'], true);
        $title = 'Riwayat Peminjaman Buku';

        return view(
            'borrower-pages.profile.loan-histories',
            compact('title', 'histories', 'fineHistories')
        );
    }

    /**
     * Mengambil riwayat peminjaman buku berdasarkan status.
     *
     * @param  int  $userId
     * @param  array  $statuses
     * @param  bool  $isFineHistory
     * @return \Illuminate\Database\Eloquent\Collection
     */

    private function getLoanHistories($userId, array $statuses, $isFineHistory = false)
    {
        $query = Loan::where('peminjam_id', $userId)
            ->with('placement.book');

        if ($isFineHistory) {
            $query->whereIn('status', $statuses);
        } else {
            $query->whereNotIn('status', $statuses)
                ->whereHas('placement.book', function ($q) {
                    $q->where('format', 'Fisik');
                });
        }

        return $query->get();
    }


    public function showChangePasswordPage()
    {
        $title = 'Ganti Password';

        return view('borrower-pages.profile.change-password', compact('title'));
    }
}
