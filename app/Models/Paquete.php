<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Paquete extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'paquetes';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombrepaquete','costopaquete','');

    public function Pago(){
        return $this->hasMany('App\Models\Pago');
    }

    public function Paquete(){
        return $this->belongsTo('App\Models\Paquete');
    }
}
