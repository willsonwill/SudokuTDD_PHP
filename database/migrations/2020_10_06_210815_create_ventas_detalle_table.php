<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('venta_id')->unsigned();
            $table->integer('propiedadDetalle_id')->unsigned();
            $table->decimal('precio_venta_m2', 20, 2);
            $table->decimal('superficie', 20, 2); // cantidad
            $table->decimal('descuento', 20, 2);
            $table->decimal('precio_venta_total', 20, 2);
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
        Schema::dropIfExists('ventas_detalle');
    }
}
