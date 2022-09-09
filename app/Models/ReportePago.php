<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReportePago extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'reporte_pagos';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('reporte_id','pago_id','creadopor','actualizadopor');

    public function Pago(){
        return $this->belongsTo('App\Models\Pago');
    }

    public function Reporte(){
        return $this->belongsTo('App\Models\Reporte');
    }
}
