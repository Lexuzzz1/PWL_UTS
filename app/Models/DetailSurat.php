<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailSurat extends Model
{
    protected $table = 'detail_surat';
    protected $primaryKey = 'id';
    protected $fillable = ['nrp', 'name', 'alamat', 'semester', 'keperluan', 'kode_mata_kuliah', 'mata_kuliah', 'tujuan_topik', 'surat_id'];

    public function surat(){
        return $this->belongsTo(Surat::class);
    }
}
