<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInfoPublicitariasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('info_publicitarias', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Logotipo',200);
            $table->string('Tipografia',200);
            $table->string('PaletaColores',100);
            $table->string('LlamadaConsulta',300);
            $table->string('InvitacionSitio',300);
            $table->string('DatosConsulta',300);

            $table->unsignedBigInteger('cliente_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes');

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
        Schema::dropIfExists('info_publicitarias');
    }
}
