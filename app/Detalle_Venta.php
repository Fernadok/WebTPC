<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detalle_Venta extends Model
{
    protected $table="detalle_ventaa";
    protected $fillable = ['cantidad'
                            ,'precio'
                            ,'total'
                            ,'venta_id'
                            ,'articulo_id'];

    public function venta(){
        return $this->belongsTo('App\Venta');
    }

    public function articulo(){
        return $this->belongsTo('App\Articulo');
    }
}
