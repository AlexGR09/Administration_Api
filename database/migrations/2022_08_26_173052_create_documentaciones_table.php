<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documentaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('INE',200);
            $table->string('Cedula',200);
            $table->string('Titulo',200);
            $table->string('ComrpobanteDomicilio',200);
            $table->string('ConstanciaFiscal',200);
            $table->string('Certificados',200);

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('info_fiscal_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->foreign('info_fiscal_id')->references('id')->on('info_fiscales');

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
        Schema::dropIfExists('documentaciones');
    }
}
