<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ciudad extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'ciudades';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombre','estado_id','pais_id','creadopor','actualizadopor');

    public function Estado(){
        return $this->belongsTo('App\Models\Estado');
    }

    public function User(){
        return $this->belongsTo('App\Models\User');
    }

    public function InfoFiscal(){
        return $this->belongsTo('App\Models\InfoFiscal');
    }

    public function Ubicacion(){
        return $this->belongsTo('App\Models\Ubicacion');
    }
}
