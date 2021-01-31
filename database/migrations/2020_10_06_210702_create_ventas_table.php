<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->integer('vendedor_id')->unsigned()->nullable();
            $table->integer('cliente_id')->unsigned();
            $table->integer('metodoPago_id')->unsigned();
            $table->date('fecha');
            $table->string('comprobante')->nullable();
            $table->integer('numero_comprobante')->nullable();
            $table->decimal('subtotal', 20, 2);
            $table->decimal('monto_descuento', 20, 2);
            $table->decimal('monto_total', 20, 2);
            $table->decimal('pago', 20, 2);
            $table->decimal('saldo', 20, 2);
            $table->string('descripcion',500)->nullable();
            $table->string('codigoMotivoAnulacion',50)->nullable();
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
        Schema::dropIfExists('ventas');
    }
}
