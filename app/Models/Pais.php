<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pais extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'paises';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombre','short','phonecode','creadopor','actualizadopor');

    public function Estado(){
        return $this->hasMany('App\Models\Estado');
    }
}
