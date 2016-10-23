<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Destacado extends Model
{
    protected $table="destacados";
    protected $fillable = ['articulo_id'
                            ,'nombre_art'
                            ,'precio_art'
                            ,'precio_mayo'
                            ,'foto_path'];

    public function articulo(){
        return $this->belongsTo('App\Articulo');
    }
}
