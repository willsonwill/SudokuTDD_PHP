<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibroDiarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libro_diario', function (Blueprint $table) {
            $table->id();
            $table->integer('planCuenta_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->dateTime('fecha');
            $table->string('tipo_documento');
            $table->string('concepto');
            $table->string('detalle')->nullable();// por compras, ventas, por gastos, cuentas x pagar, cuentas x cobrar
            $table->string('observacion')->nullable();
            $table->string('cheque')->nullable();
            $table->decimal('debe', 20, 2);
            $table->decimal('haber', 20, 2);
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
        Schema::dropIfExists('libro_diario');
    }
}
