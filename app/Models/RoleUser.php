<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RoleUser extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'role_user';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('rol_id','user_id','creadopor','actualizadopor');
}
