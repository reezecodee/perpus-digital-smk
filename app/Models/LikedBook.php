<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LikedBook extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }

    public function borrower()
    {
        return $this->belongsTo(User::class, 'peminjam_id', 'id');
    }
}
