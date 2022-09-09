<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCaracteristicasUbicacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_ubicaciones', function (Blueprint $table) {
            $table->id();
            $table->string('turno');
            $table->integer('promediopacientes');
            $table->integer('capacidadmaxima');
            $table->string('nivelcompetencia');
            $table->integer('precioconsultacompetencia');

            $table->unsignedBigInteger('ubicacion_id')->nullable();

            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones')->onDelete("cascade");

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
        Schema::dropIfExists('caracteristicas_ubicaciones');
    }
}
