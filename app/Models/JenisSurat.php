<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat'; // Make sure this matches the table name in your database
    protected $fillable = ['nama']; // Adjust the fields as per your database
}
