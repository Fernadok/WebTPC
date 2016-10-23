<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table ="rols";
    protected $fillable = ['descripcion'];

    public function rols(){
        return $this->hasMany('App\UserRol');
    }
}
