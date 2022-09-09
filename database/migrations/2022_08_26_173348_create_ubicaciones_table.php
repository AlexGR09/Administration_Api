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
            $table->string('tipo');
            $table->string('nombreubicaciones');
            $table->string('cofeprisfunc');
            $table->string('cofeprispubli');
            $table->string('email');
            $table->bigInteger('telefonocitas');
            $table->string('tipotelefono');
            $table->bigInteger('telefonoemergencias');
            $table->string('imagenubicacion');
            $table->string('tipovialidad');
            $table->string('nombrevialidad');
            $table->string('numeroexterior');
            $table->string('numerointerior');
            $table->string('tipocolonia');
            $table->string('nombrecolonia');
            $table->integer('cp');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('info_fiscal_id')->nullable();
            $table->unsignedBigInteger('ciudad_id')->nullable();
            
            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete("cascade");
            $table->foreign('info_fiscal_id')->references('id')->on('info_fiscales')->onDelete("cascade");
            $table->foreign('ciudad_id')->references('id')->on('ciudades')->onDelete("cascade");
            
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
