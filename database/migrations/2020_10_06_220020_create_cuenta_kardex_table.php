<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCuentaKardexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cuenta_kardex', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->unsigned();
            $table->dateTime('fecha');
            $table->string('tipo_documento');
            $table->string('concepto');
            $table->string('detalle')->nullable();// por compras, ventas, por gastos, cuentas x pagar, cuentas x cobrar
            $table->string('observacion');
            $table->decimal('saldo_entrada', 20, 2);
            $table->decimal('saldo_salida', 20, 2);
            $table->decimal('saldo_total', 20, 2);
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
        Schema::dropIfExists('cuenta_kardex');
    }
}
