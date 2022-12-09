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
    protected $fillable = array('tipo','nombreubicaciones','cofeprisfunc','cofeprispubli','email','telefonocitas','tipotelefono','telefonoemergencias','imagenubicacion','tipovialidad','nombrevialidad','numeroexterior','numerointerior',' tipocolonia','nombrecolonia','cp','cliente_id','municipio_id','creadopor','actualizadopor');

    public function caracteristicasubicacion(){
        return $this->hasOne('App\Models\CaracteristicasUbicacion');
    }

    public function municipio(){
        return $this->belongsTo('App\Models\Municipio')->with('Estado');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function infofiscalubicacion(){
        return $this->hasOne('App\Models\InfoFiscalUbicacion');
    }
}
