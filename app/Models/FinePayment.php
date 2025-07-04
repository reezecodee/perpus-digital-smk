<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinePayment extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function borrower()
    {
        return $this->belongsTo(User::class, 'peminjam_id', 'id');
    }

    public function loan()
    {
        return $this->belongsTo(Loan::class, 'peminjaman_id', 'id');
    }
}
