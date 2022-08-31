<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    public function Especialidad(){
        return $this->hasMany(Especialidad::class);
    }

    public function InfoPublicitaria(){
        return $this->hasMany(InfoPublicitaria::class);
    }

    public function InfoFiscal(){
        return $this->hasOne(InfoFiscal::class);
    }

    public function Ubicacion(){
        return $this->hasMany(Ubicacion::class);
    }

    public function RedSocial(){
        return $this->hasMany(RedSocial::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }
}
