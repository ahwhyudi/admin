<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saksi extends Model
{
    use HasFactory;

    public function dapil(){
        return $this->belongsTo(Dapil::class, 'dapil_id', 'id');
    }
}
