<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContenidoPaquete extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'contenido_paquetes';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('descripcion','paquete_id','servicio_id','creadopor','actualizadopor');

    public function Paquete(){
        return $this->hasOne('App\Models\Paquete');
    }

    public function Servicio(){
        return $this->belongsTo('App\Models\Servicio');
    }
}
