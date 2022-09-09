<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use  HasApiTokens, SoftDeletes, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $dates = ['deleted_at'];
    protected $fillable = array('username','email','password','nombre','apellidopaterno','apellidomaterno','telefonopersonal','fechanacimiento','edad','genero','ciudad_id','estado_id','pais_id','creadopor','actualizadopor');

    public function RolUsuario(){
        return $this->hasMany('App\Models\RolUsuario');
    }

    public function Empleado(){
        return $this->hasOne('App\Models\Empleado');
    }

    public function Cliente(){
        return $this->hasOne('App\Models\Cliente');
    }

    public function Freelancer(){
        return $this->hasOne('App\Models\Freelancer');
    }

    public function CreadoPor(){
        return $this->belongsTo('App\Models\User');
    }

    public function ActualizadoPor(){
        return $this->belongsTo('App\Models\User');
    }
}
