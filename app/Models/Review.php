<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory, HasUuids;

    public function borrower_review()
    {
        return $this->belongsTo(User::class, 'peminjam_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }
}
