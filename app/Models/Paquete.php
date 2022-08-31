<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paquete extends Model
{
    use HasFactory;

    public function Pago(){
        return $this->hasMany(Pago::class);
    }

    public function Paquete(){
        return $this->belongsTo(Paquete::class);
    }
}
