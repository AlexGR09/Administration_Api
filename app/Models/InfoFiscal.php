<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InfoFiscal extends Model
{
    use HasFactory;

    public function Documentacion(){
        return $this->hasMany(Documentacion::class);
    }

    public function Pago(){
        return $this->hasMany(Pago::class);
    }

    public function Ciudad(){
        return $this->hasOne(Ciudad::class);
    }

    public function Cliente(){
        return $this->belongsTo(Cliente::class);
    }

    public function Ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
}
