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
    protected $fillable = array('razonsocial','rfc','tipovialidad','nombrevialidad','numeroexterior','numerointerior','tipocolonia','nombrecolonia','cp','cliente_id','municipio','creadopor','actualizadopor');

    public function documentacion(){
        return $this->hasMany('App\Models\Documentacion');
    }

    public function pago(){
        return $this->hasMany('App\Models\Pago');
    }

    public function municipio(){
        return $this->hasOne('App\Models\Municipio');
    }

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    
}
