<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $table = 'jenis_surat';
    protected $fillable = ['name', 'status', 'deskripsi'];

    public function surat(){
        return $this->hasMany(Surat::class);
    }
}
