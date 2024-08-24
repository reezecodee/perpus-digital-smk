<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }

    public function peminjam()
    {
        return $this->belongsTo(User::class, 'peminjam_id', 'id');
    }

    public function fine_payment()
    {
        return $this->hasOne(FinePayment::class, 'peminjaman_id', 'id');
    }
}
