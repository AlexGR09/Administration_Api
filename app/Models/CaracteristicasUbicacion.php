<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CaracteristicasUbicacion extends Model
{
    use HasFactory;

    public function Ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
}
