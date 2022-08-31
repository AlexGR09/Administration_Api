<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    public function CaracteristicasUbicacion(){
        return $this->hasOne(CaracteristicasUbicacion::class);
    }

    public function Ciudad(){
        return $this->hasOne(Ciudad::class);
    }

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function InfoFiscal(){
        return $this->belongsTo(InfoFiscal::class);
    }
}
