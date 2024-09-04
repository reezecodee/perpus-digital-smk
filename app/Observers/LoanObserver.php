<?php

namespace App\Observers;

use App\Models\Loan;
use App\Models\Placement;

class LoanObserver
{
    /**
     * Handle the Loan "created" event.
     */
    public function created(Loan $loan): void
    {
        //
    }

    /**
     * Handle the Loan "updated" event.
     */
    public function updated(Loan $loan): void
    {
        $placement = Placement::find($loan->penempatan_id); 

        if (in_array($loan->status, ['Sudah dikembalikan', 'Ditolak'])) {
            if ($placement) {
                $placement->increment('buku_saat_ini', 1);  
            }
        } 
        elseif ($loan->status === 'Terkena denda') {
            if ($placement) {
                $placement->decrement('buku_saat_ini', 1);  
            }
        }
    }

    /**
     * Handle the Loan "deleted" event.
     */
    public function deleted(Loan $loan): void
    {
        //
    }

    /**
     * Handle the Loan "restored" event.
     */
    public function restored(Loan $loan): void
    {
        //
    }

    /**
     * Handle the Loan "force deleted" event.
     */
    public function forceDeleted(Loan $loan): void
    {
        //
    }
}
