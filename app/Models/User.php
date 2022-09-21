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
    use  HasApiTokens, hasPermisos, SoftDeletes, HasFactory, Notifiable;

    protected $table = 'users';
    public $timestamps = false;

    protected $dates = ['deleted_at'];
    protected $fillable = array('username','email','password','nombre','apellidopaterno','apellidomaterno','telefonopersonal','fechanacimiento','edad','genero','ciudad_id','estado_id','pais_id','creadopor','actualizadopor');

    public function roles(){
        return $this->belongsToMany('App\\Models\Role','role_user');
    }

    public function empleado(){
        return $this->hasOne('App\Models\Empleado');
    }

    public function cliente(){
        return $this->hasOne('App\Models\Cliente');
    }

    public function freelancer(){
        return $this->hasOne('App\Models\Freelancer');
    }

    public function creadoPor(){
        return $this->belongsTo('App\Models\User');
    }

    public function actualizadoPor(){
        return $this->belongsTo('App\Models\User');
    }
}
