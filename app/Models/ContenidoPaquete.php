<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContenidoPaquete extends Model
{
    use HasFactory;

    public function Paquete(){
        return $this->hasOne(Paquete::class);
    }

    public function Servicio(){
        return $this->belongsTo(Sevicio::class);
    }
}
