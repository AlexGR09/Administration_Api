<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'clientes';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('titulo','foto','tipotelefono','telefonocliente','user_id','especialidad_id','creadopor','actualizadopor');

    public function Especialidad(){
        return $this->hasMany('App\Models\Especialidad');
    }

    public function InfoPublicitaria(){
        return $this->hasMany('App\Models\InfoPublicitaria');
    }

    public function InfoFiscal(){
        return $this->hasOne('App\Models\InfoFiscal');
    }

    public function Ubicacion(){
        return $this->hasMany('App\Models\Ubicacion');
    }

    public function RedSocial(){
        return $this->hasMany('App\Models\RedSocial');
    }

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
