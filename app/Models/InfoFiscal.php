<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoFiscal extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'info_fiscales';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('razonsocial','rfc','tipovialidad','nombrevialidad','numeroexterior','numerointerior','tipocolonia','nombrecolonia','cp','cliente_id','ciudad_id','estado_id','pais_id','creadopor','actualizadopor');

    public function Documentacion(){
        return $this->hasMany('App\Models\Documentacion');
    }

    public function Pago(){
        return $this->hasMany('App\Models\Pago');
    }

    public function Ciudad(){
        return $this->hasOne('App\Models\Ciudad');
    }

    public function Cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function Ubicacion(){
        return $this->belongsTo('App\Models\Ubicacion');
    }
}
