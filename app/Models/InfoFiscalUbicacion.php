<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoFiscalUbicacion extends Model
{
    use HasFactory,SoftDeletes;

    protected $table = 'info_fiscales_ubicaciones';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('razonsocial','rfc','tipovialidad','nombrevialidad','numeroexterior','numerointerior','tipocolonia','nombrecolonia','cp','ubicacion_id','municipio_id','creadopor','actualizadopor');

    public function municipio(){
        return $this->hasOne('App\Models\Municipio');
    }

    public function ubicacion(){
        return $this->belongsTo('App\Models\Ubicacion');
    }
}
