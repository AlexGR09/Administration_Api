<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->string('foto',100);
            $table->string('curp',18);
            $table->enum('tipotelefono',array('movil','casa','oficina'));
            $table->bigInteger('telefonocliente');

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('especialidad_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('especialidad_id')->references('id')->on('especialidades');

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
        Schema::dropIfExists('clientes');
    }
}
