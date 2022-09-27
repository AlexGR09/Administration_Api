<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especialidad extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'especialidades';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('especialidad','creadopor','actualizadopor');

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente')->with('User');
    }
}
