<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRol extends Model
{
    protected $table ="user_rols";
    protected $fillable = ['user_id','rol_id','fecha_r'];

    public function rol(){
        return $this->belongsTo('App\Rols');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
