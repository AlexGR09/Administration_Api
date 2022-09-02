<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RedSocial extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'redes_sociales';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('tipo','url','usuario','password');

    public function Cliente(){
        return $this->belongsTo('App\Models\Cliente');
    }
}
