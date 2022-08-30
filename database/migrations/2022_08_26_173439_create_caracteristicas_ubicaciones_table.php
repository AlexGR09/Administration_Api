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
            $table->bigIncrements('id');
            $table->string('Turno');
            $table->integer('PromedioPacientes');
            $table->integer('CapacidadMaxima');
            $table->string('NivelCompetencia');
            $table->integer('PrecioConsultaCompetencia');

            $table->unsignedBigInteger('ubicacion_id')->nullable();

            $table->foreign('ubicacion_id')->references('id')->on('ubicaciones');

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
