<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoFiscalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_fiscales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('RazonSocial',150);
            $table->string('RFC',13);
            $table->string('TipoVialidad');
            $table->string('NombreVialidad');
            $table->string('NumeroExterior',10);
            $table->string('NumeroInterior',10);
            $table->string('TipoColonia');
            $table->string('NombreColonia');
            $table->integer('CP');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('estado_id')->references('id')->on('ciudades');
            $table->foreign('pais_id')->references('id')->on('ciudades');

            $table->unsignedBigInteger('creadopor_id')->nullable();
            $table->unsignedBigInteger('actualizadopor_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info_fiscales');
    }
}
