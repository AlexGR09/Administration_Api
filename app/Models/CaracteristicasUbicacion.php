<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CaracteristicasUbicacion extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'caracteristicas_ubicaciones';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('turno','promediopacientes','capacidadmaxima','nivelcompetencia','precioconsultacompetencia','ubicacion_id','creadopor','actuaizadopor');

    public function ubicacion(){
        return $this->belongsTo('App\Models\Ubicacion');
    }
}
