<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticulosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articulos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('descripcion');
            $table->decimal('precio_costo');
            $table->decimal('precio_venta');
            $table->integer('stock');
            $table->string('estado_stock');
            $table->integer('venta_minima');
            $table->integer('subcategoria_id')->unsigned();
            $table->foreign('subcategoria_id')->references('id')->on('subcategorias')->onDelete('cascade');
            $table->mediumText('detalle');
            $table->string('foto_path');
            $table->string('foto_grande');
            $table->decimal('precio_mayorista');
            $table->decimal('precio_tecnico');
            $table->integer('porcentaje');
            $table->decimal('ganancia');
            $table->longText('detalle_largo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('articulos');
    }
}
