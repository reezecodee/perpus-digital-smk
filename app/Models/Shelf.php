<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shelf extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function placement()
    {
        return $this->hasMany(Placement::class, 'rak_id', 'id');
    }

    public function getSeluruhJumlahBukuAttribute()
    {
        return $this->placement->sum('jumlah_buku');
    }
}
