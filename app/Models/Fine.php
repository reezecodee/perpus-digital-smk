<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fine extends Model
{
    use HasFactory, HasUuids;

    public function borrower()
    {
        return $this->hasMany(Borrower::class, 'denda_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }
}
