<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'nama',         // Nama pengguna
        'username',     // Username
        'email',        // Email
        'password',     // Password
        'role',         // Role (admin, user, guru)
    ];

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
    public function guru()
{
    return $this->hasOne(Guru::class);
}
public function siswa()
{
    return $this->hasOne(Siswa::class, 'user_id');
}
public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kelas_id');
    }
}
