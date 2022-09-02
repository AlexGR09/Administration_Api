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
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $table = 'users';
    public $timestamps = true;

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
}
