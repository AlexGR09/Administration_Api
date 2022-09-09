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
            $table->id();
            $table->enum('metodopago',array('paypal', 'tarjeta de credito', 'tarjeta de debito', 'cheque', 'transferencia'));
            $table->date('fechapago');
            $table->enum('periodostiempo',array('mensual','bimestral','trimestral','anual'));
            $table->float('monto');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('info_fiscal_id')->nullable();
            $table->unsignedBigInteger('paquete_id')->nullable();

            $table->foreign('info_fiscal_id')->references('id')->on('info_fiscales')->onDelete("cascade");
            $table->foreign('paquete_id')->references('id')->on('paquetes')->onDelete("cascade");

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
