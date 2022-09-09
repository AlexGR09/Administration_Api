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
            $table->id();
            $table->string('logotipo',200);
            $table->string('tipografia',200);
            $table->string('paletacolores',100);
            $table->string('llamadaconsulta',300);
            $table->string('invitacionsitio',300);
            $table->string('datosconsulta',300);

            $table->unsignedBigInteger('cliente_id')->nullable();

            $table->foreign('cliente_id')->references('id')->on('clientes')->onDelete("cascade");

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
