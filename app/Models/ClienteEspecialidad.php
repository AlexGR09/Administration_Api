<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ClienteEspecialidad extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'cliente_especialidad';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('cliente_id','especialidad_id','creadopor','actualizadopor');

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }

    public function especialidad(){
        return $this->belongsTo('App\Models\Especialidad');
    }
}
