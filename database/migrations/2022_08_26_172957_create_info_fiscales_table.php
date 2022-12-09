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
            $table->id();
            $table->string('razonsocial',150);
            $table->string('rfc',13);
            $table->string('tipovialidad');
            $table->string('nombrevialidad');
            $table->string('numeroexterior',10);
            $table->string('numerointerior',10);
            $table->string('tipocolonia');
            $table->string('nombrecolonia');
            $table->integer('cp');

            $table->unsignedBigInteger('cliente_id')->nullable();
            $table->unsignedBigInteger('municipio_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete("cascade");
            $table->foreign('municipio_id')->references('id')->on('municipios')->onDelete("cascade");
            
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
