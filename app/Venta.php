<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table ="ventas";
    protected $fillable = ['fecha','domicilio_entrega','user_id','tipo_pago_id'];


    public function tipoPago(){
        return $this->belongsTo('App\Tipo_Pago');
    }

    public function detalleVenta(){
        return $this->hasMany('App\Detalle_Venta');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function tipoPago(){
        return $this->belongsTo('App\Tipo_Pago');
    }
}
