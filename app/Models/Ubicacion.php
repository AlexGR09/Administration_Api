<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ubicacion extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'ubicaciones';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('tipo','nombreubicaciones','cofeprisfunc','cofeprispubli','email','telefonocitas','tipotelefono','telefonoemergencias','imagenubicacion','tipovialidad','nombrevialidad','numeroexterior','numerointerior',' tipocolonia','nombrecolonia','cp','cliente_id','info_fiscal_id','ciudad_id','creadopor','actualizadopor');

    public function CaracteristicasUbicacion(){
        return $this->hasOne('App\Models\CaracteristicasUbicacion');
    }

    public function Ciudad(){
        return $this->hasOne('App\Models\Ciudad');
    }

    public function Cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function InfoFiscal(){
        return $this->belongsTo('App\Models\InfoFiscal');
    }
}
