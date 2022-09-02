<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rol extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'roles';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('rol','creadopor','actualizadopor');

    public function RolUsuario(){
        return $this->hasMany(RolUsuario::class);
    }
}
