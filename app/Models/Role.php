<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = "roles";
    public $timestamps = true;

    protected $dates = ['deleted_at'];

    protected $fillable =array('nombre','creadopor','actualizadopor');

    public function user(){
        return $this->belongsToMany('App\\Models\User','role_user');
    }

    public function creadopor(){
        return $this->belongsTo('App\Models\User');
    }

    public function actualizadopor(){
        return $this->belongsTo('App\Models\User');
    }
}
