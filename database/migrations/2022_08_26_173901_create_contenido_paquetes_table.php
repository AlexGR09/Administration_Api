<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContenidoPaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contenido_paquetes', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');

            $table->unsignedBigInteger('paquete_id')->nullable();
            $table->unsignedBigInteger('servicio_id')->nullable();

            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete("cascade");
            $table->foreign('servicio_id')->references('id')->on('servicios')->onDelete("cascade");

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
        Schema::dropIfExists('contenido_paquetes');
    }
}
