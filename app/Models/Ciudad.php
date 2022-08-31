<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciudad extends Model
{
    use HasFactory;

    public function Estado(){
        return $this->belongsTo(Estado::class);
    }

    public function User(){
        return $this->belongsTo(User::class);
    }

    public function InfoFiscal(){
        return $this->belongsTo(InfoFiscal::class);
    }

    public function Ubicacion(){
        return $this->belongsTo(Ubicacion::class);
    }
}
