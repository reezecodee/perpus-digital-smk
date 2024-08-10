<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrower extends Model
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

    public function fine()
    {
        return $this->belongsTo(Fine::class, 'denda_id', 'id');
    }
} 
