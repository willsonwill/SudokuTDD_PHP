<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_razon_social',200);
            $table->string('codigo');
            $table->integer('documentoIdentidad_id')->unsigned()->nullable();
            $table->string('numero_documento',20)->nullable();
            $table->string('complemento',20)->nullable();
            $table->string('direccion',300)->nullable();
            $table->string('email',50)->nullable();
            $table->string('telefono1',20)->nullable();
            $table->string('telefono2',20)->nullable();
            $table->string('celular1',20)->nullable();
            $table->string('celular2',20)->nullable();
            $table->string('tipo_persona');
            $table->string('imagen',1000)->default('no_imagen.png')->nullable();
            $table->string('comentarios',300)->nullable();
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
        Schema::dropIfExists('persona');
    }
}
