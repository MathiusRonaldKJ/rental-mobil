<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // Relasi one-to-many dengan Pemesanan - PERBAIKI INI
    public function pemesanans()
    {
        return $this->hasMany('App\Models\Pemesanan');
    }

    // Helper method untuk check role
    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    // Method untuk check user biasa
    public function isUser()
    {
        return $this->role === 'user';
    }
}