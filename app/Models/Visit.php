<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visit extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function peminjam() 
    {
        return $this->belongsTo(User::class, 'pengunjung_id', 'id');
    }
}
