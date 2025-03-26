<?php
// app/Models/Role.php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table = 'role';

    /**
     * Relasi antara Role dan User (One to Many)
     * Memastikan bahwa satu role dapat dimiliki oleh banyak pengguna
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
