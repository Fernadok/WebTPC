<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tipo_Pago extends Model
{
    protected $table = "tipo_pagos";
    protected $fillable = ['descripcion','dolar'];

    public function ventas(){
        return $this->hasMany('App\Venta');
    }
}
