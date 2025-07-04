<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = ['id'];

    public function sender()
    {
        return $this->belongsTo(User::class, 'pengirim_id', 'id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'penerima_id', 'id');
    }
}
