<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Relasi antara User dan Role (One to Many)
     * Memastikan pengguna memiliki satu role.
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id'); // Pastikan 'role_id' sesuai dengan kolom di tabel users
    }

    protected $fillable = [
        'name',
        'email',
        'password',
        'role_id',  // Pastikan 'role_id' ada di sini
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

