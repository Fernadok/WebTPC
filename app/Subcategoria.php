<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subcategoria extends Model
{
    protected $table ="subcategorias";
    protected $fillable = ['descripcion','categoria_id'];

    public function categoria(){
        return $this->belongsTo('App\Categoria');
    }

    public function articulos(){
        return $this->hasMany('App\Articulo');
    }
}
