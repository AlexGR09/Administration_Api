<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RolUsuario extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'rol_usuarios';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('rol_id','user_id','creadopor','actualizadopor');

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function Rol(){
        return $this->belongsTo('App\Models\Rol');
    }
}
