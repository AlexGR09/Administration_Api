<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pago extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'pagos';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('metodopago','fechapago','periodostiempo','monto','info_fiscal_id','paquete_id','creadopor','actualizadopor');

    public function reportepago(){
        return $this->hasMany('App\Models\ReportePago');
    }

    public function infofiscal(){
        return $this->belongsTo('App\Models\InfoFiscal');
    }

    public function paquete(){
        return $this->belongsTo('App\Models\Paquete');
    }
}
