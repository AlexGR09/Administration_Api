<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Servicio extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'servicios';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('nombreservicio','costoservicio','creadopor','actualizadopor');

    public function ContenidoPaquete(){
        return $this->hasMany('App\Models\ContenidoPaquete');
    }
}
