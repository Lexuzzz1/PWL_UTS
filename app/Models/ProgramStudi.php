<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    // Jika nama tabel tidak mengikuti konvensi plural Laravel (misalnya tabel Anda bernama `program_studi`),
    // Anda bisa menetapkan nama tabel secara eksplisit.
    protected $table = 'program_studi';  // Sesuaikan dengan nama tabel yang benar

    // Tentukan atribut mana yang boleh diisi secara massal
    protected $fillable = [
        'nama',  // Atribut yang boleh diisi massal
    ];

    // Jika tabel tidak memiliki kolom created_at dan updated_at, nonaktifkan timestamp
    public $timestamps = false;  // Jika tidak ada kolom created_at dan updated_at
}
