<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reporte extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'reportes';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('fecha','montototal');

    public function ReportePago(){
        return $this->hasMany('App\Models\ReportePago');
    }
}
