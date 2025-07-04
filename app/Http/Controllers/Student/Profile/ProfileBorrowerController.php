<?php

namespace App\Http\Controllers\Student\Profile;

use App\Http\Controllers\Controller;
use App\Models\Loan;

class ProfileBorrowerController extends Controller
{
    public function showOverviewPage()
    {
        $title = 'Overview Profile';

        return view('student-pages.profile.overview', compact('title'));
    }

    public function showHistoryPage()
    {
        $userId = auth()->user()->id;

        $histories = $this->getLoanHistories($userId, ['Terkena denda', 'Sudah dibayar', 'E-book'], false);
        $fineHistories = $this->getLoanHistories($userId, ['Terkena denda', 'Sudah dibayar'], true);
        $title = 'Riwayat Peminjaman Buku';

        return view(
            'student-pages.profile.loan-histories',
            compact('title', 'histories', 'fineHistories')
        );
    }

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

        return view('student-pages.profile.change-password', compact('title'));
    }
}
