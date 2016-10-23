<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    protected $table ="articulos";
    protected $fillable = ['descripcion'
                            ,'precio_costo'
                            ,'precio_venta'
                            ,'stock'
                            ,'estado_stock'
                            ,'venta_minima'
                            ,'subcategoria_id'
                            ,'detalle'
                            ,'foto_path'
                            ,'foto_grande'
                            ,'precio_mayorista'
                            ,'precio_tecnico'
                            ,'porcentaje'
                            ,'ganancia'
                            ,'detalle_largo'];

    public function subcategoria(){
        return $this->belongsTo('App\Subcategoria');
    }

    public function destacados(){
        return $this->hasMany('App\Destacado');
    }

    public function ventas(){
        return $this->hasMany('App\Venta');
    }

}
