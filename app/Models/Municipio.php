<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipio extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'municipios';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombre','estado_id','pais_id','creadopor','actualizadopor');

    public function estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function infofiscal(){
        return $this->belongsTo('App\Models\InfoFiscal');
    }

    public function ubicacion(){
        return $this->belongsTo('App\Models\Ubicacion');
    }
}
