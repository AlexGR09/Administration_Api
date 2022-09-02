<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class InfoPublicitaria extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'info_publicitarias';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('logotipo','tipografía','paletadecolores','llamadaconsulta','invitacionconsulta','invitacionsitio','datosconsulta','cliente_id','creadopor','actualizadopor');

    public function InfoPublicitaria(){
        return $this->belongsTo('App\Models\InfoPublicitaria');
    }
}
