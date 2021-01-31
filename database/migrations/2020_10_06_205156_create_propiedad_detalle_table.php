<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropiedadDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propiedad_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('propiedad_id')->unsigned();
            $table->string('ubicacion');
            $table->string('latitud');
            $table->string('longitud');
            $table->decimal('superficie', 20, 2);
            $table->decimal('precio_venta_m2', 20, 2);
            $table->decimal('precio_venta_total', 20, 2);
            $table->string('tipo');
            $table->string('descripcion',5000);
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('propiedad_detalle');
    }
}
