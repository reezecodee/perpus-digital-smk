<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function liked_book()
    {
        return $this->hasMany(LikedBook::class, 'buku_id', 'id');
    }

    public function borrower()
    {
        return $this->hasMany(Borrower::class, 'buku_id', 'id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'kategori_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'buku_id', 'id');
    }

    public function fine()
    {
        return $this->hasOne(Fine::class, 'buku_id', 'id');
    }

    public function scopeAvailable($query)
    {
        return $query->where('status', 'tersedia');
    }

    public function scopePhysical($query)
    {
        return $query->where('format', 'Fisik');
    }
}
