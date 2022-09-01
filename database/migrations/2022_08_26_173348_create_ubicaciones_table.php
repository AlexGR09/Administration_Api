<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('Tipo');
            $table->string('NombreUbicaciones');
            $table->string('COFEPRISFunc');
            $table->string('COFEPRISPubli');
            $table->string('Email');
            $table->bigInteger('TelefonoCitas');
            $table->string('TipoTelefono');
            $table->bigInteger('TelefonoEmergencias');
            $table->string('ImagenUbicacion');
            $table->string('TipoVialidad');
            $table->string('NombreVialidad');
            $table->string('NumeroExterior');
            $table->string('NumeroInterior');
            $table->string('TipoColonia');
            $table->string('NombreColonia');
            $table->integer('CP');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('info_fiscal_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('info_fiscal_id')->references('id')->on('info_fiscales');
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
        Schema::dropIfExists('ubicaciones');
    }
}
