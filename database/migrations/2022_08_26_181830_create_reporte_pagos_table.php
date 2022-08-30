<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReportePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reporte_pagos', function (Blueprint $table) {
            $table->id();

            $table->foreignId('reporte_id')->references('id')->on('reportes');
            $table->foreignId('pago_id')->references('id')->on('pagos');
            $table->foreignId('info_fiscal_id')->references('id')->on('pagos');
            $table->foreignId('cliente->id')->references('id')->on('pagos');
            $table->foreignId('paquete_id')->references('id')->on('pagos');

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
        Schema::dropIfExists('reporte_pagos');
    }
}
