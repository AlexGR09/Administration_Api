<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Estado extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'estados';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombre','pais_id','creadopor','actualizadopor');

    public function pais(){
        return $this->belongsTo('App\Models\Pais');
    }

    public function municipio(){
        return $this->hasMany('App\Models\Municipio');
    }
}
