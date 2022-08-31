<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportePago extends Model
{
    use HasFactory;

    public function Pago(){
        return $this->belongsTo(Pago::class);
    }

    public function Reporte(){
        return $this->belongsTo(Reporte::class);
    }
}
