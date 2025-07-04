<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasUuids, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $fillable = [
    //     'name',
    //     'email',
    //     'password',
    // ];

    protected $guarded = ['id'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function sender()
    {
        return $this->hasMany(Notification::class, 'pengirim_id', 'id');
    }

    public function receiver()
    {
        return $this->hasMany(Notification::class, 'penerima_id', 'id');
    }

    public function liked_book()
    {
        return $this->hasMany(LikedBook::class, 'peminjam_id', 'id');
    }

    public function loan()
    {
        return $this->hasMany(Loan::class, 'peminjam_id', 'id');
    }

    public function review()
    {
        return $this->hasMany(Review::class, 'peminjam_id', 'id');
    }

    public function visit()
    {
        return $this->hasMany(Visit::class, 'pengunjung_id', 'id');
    }

    public function help()
    {
        return $this->hasMany(Help::class, 'pelapor_id', 'id');
    }

    public function log()
    {
        return $this->hasMany(LogActivity::class, 'user_id', 'id');
    }
}
