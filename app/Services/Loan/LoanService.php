<?php

namespace App\Services\Loan;

class LoanService
{
    public function generateLoanCode()
    {
        return str_pad(random_int(0, 9999999999), 10, '0', STR_PAD_LEFT);
    }
}
