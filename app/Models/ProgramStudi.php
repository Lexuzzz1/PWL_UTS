<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProgramStudi extends Model
{
    protected $table = 'program_studi';
    protected $fillable = ['id','name'];

    public function user(){
        return $this->hasMany(User::class);
    }
}
