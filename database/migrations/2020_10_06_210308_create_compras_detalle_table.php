<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasDetalleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras_detalle', function (Blueprint $table) {
            $table->id();
            $table->integer('compra_id')->unsigned();
            $table->integer('propiedadDetalle_id')->unsigned();
            /*$table->string('ubicacion');
            $table->string('latitud');
            $table->string('longitud');
            $table->decimal('superficie', 20, 2); // cantidad
            $table->decimal('precio_compra_m2', 20, 2);
            $table->decimal('precio_compra_total', 20, 2);
            $table->string('tipo');
            $table->string('descripcion',5000);*/
            $table->decimal('superficie', 20, 2); // cantidad
            $table->decimal('precio_compra_m2', 20, 2);
            $table->decimal('precio_compra_total', 20, 2);
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
        Schema::dropIfExists('compras_detalle');
    }
}
