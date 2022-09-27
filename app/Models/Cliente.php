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
    protected $fillable = array('titulo','foto','tipotelefono','telefonocliente','user_id','creadopor','actualizadopor');

    public function especialidad(){
        return $this->belongsToMany('App\Models\Especialidad');
    }

    public function infopublicitaria(){
        return $this->hasMany('App\Models\InfoPublicitaria');
    }

    public function infofiscal(){
        return $this->hasOne('App\Models\InfoFiscal');
    }

    public function ubicacion(){
        return $this->hasMany('App\Models\Ubicacion');
    }

    public function redsocial(){
        return $this->hasMany('App\Models\RedSocial');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
