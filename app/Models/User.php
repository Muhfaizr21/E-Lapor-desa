<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // tambahkan role
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // otomatis hash password saat create/update
        ];
    }

    /**
     * Relasi User ke Report.
     */
    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    /**
     * Relasi User ke Comment.
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Helper untuk cek apakah user admin.
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }
}
