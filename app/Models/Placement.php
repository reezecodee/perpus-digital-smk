<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Placement extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function shelf()
    {
        return $this->belongsTo(Shelf::class, 'rak_id', 'id');
    }

    public function book()
    {
        return $this->belongsTo(Book::class, 'buku_id', 'id');
    }
}
