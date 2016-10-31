<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password','telefono','empresa','direccion','isActive'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function Rols(){
        return $this->hasMany('App\UserRol');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }

    public function admin(){

    }
}
