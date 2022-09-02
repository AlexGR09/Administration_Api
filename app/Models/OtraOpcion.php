<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class OtraOpcion extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'otras_opciones';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('txtonuevo','tablaorigen','creadopor','actualizadopor');
}
