<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRedesSocialesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('redes_sociales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Tipo');
            $table->string('URL',200);
            $table->string('Usuario');
            $table->string('Contraseña');

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
        Schema::dropIfExists('redes_sociales');
    }
}
