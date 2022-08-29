<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('Username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('Nombre');
            $table->string('ApellidoPaterno');
            $table->string('ApellidoMaterno');
            $table->integer('TeléfonoPersonal');
            $table->date('FechaNacimiento');
            $table->integer('Edad');
            $table->string('Genero');

            $table->unsignedBigInteger('ciudad_id')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->unsignedBigInteger('pais_id')->nullable();

            $table->foreign('ciudad_id')->references('id')->on('ciudades');
            $table->foreign('estado_id')->references('id')->on('ciudades');
            $table->foreign('pais_id')->references('id')->on('ciudades');

            $table->unsignedBigInteger('creadopor_id')->nullable();
            $table->unsignedBigInteger('actualizadopor_id')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
