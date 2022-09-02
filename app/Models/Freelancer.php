<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Freelancer extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'freelancers';
    public $timestamps = true;

    protected $dates = ['deleted_at'];
    protected $fillable = array('user_id','creadopor','actualizadopor');

    public function User(){
        return $this->belongsTo('App\Models\User');
    }
}
