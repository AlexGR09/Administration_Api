<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Documentacion extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'documentaciones';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('ine','cedula','titulo','comprobantedomicilio','constanciafiscal','certificados','cliente_id','info_fiscal_id','creadopor','actualizadopor');

    public function infofiscal(){
        return $this->belongsTo('App\Models\InfoFiscal');
    }
}
