<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Surat extends Model
{
    protected $table = 'surat';
    protected $fillable = ['status', 'jenis_surat_id', 'user_id'];

    public function jenisSurat(){
        return $this->belongsTo(JenisSurat::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function detailSurat(){
        return $this->hasOne(DetailSurat::class);
    }
}
