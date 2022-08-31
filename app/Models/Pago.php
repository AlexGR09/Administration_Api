<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    public function ReportePago(){
        return $this->hasMany(ReportePago::class);
    }

    public function InfoFiscal(){
        return $this->belongsTo(InfoFiscal::class);
    }

    public function Paquete(){
        return $this->belongsTo(Paquete::class);
    }
}
