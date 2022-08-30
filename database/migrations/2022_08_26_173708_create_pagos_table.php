<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->enum('MetodoPago',array('Paypal', 'Tarjeta de crèdito', 'Tarjeta de dèbito', 'Cheque', 'Transferencia'));
            $table->date('FechaPago');
            $table->enum('PeriodosTiempo',array('Mensual','Bimestral','Trimestral','Anual'));
            $table->float('Monto');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('info_fiscal_id')->nullable();
            $table->unsignedBigInteger('paquete_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('info_fiscales');
            $table->foreign('info_fiscal_id')->references('id')->on('info_fiscales');
            $table->foreign('paquete_id')->references('id')->on('paquetes');

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
        Schema::dropIfExists('pagos');
    }
}
