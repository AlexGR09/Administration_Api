<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaquetesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paquetes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('NombrePaquete');
            $table->float('CostoPaquete');
            
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
        Schema::dropIfExists('paquetes');
    }
}
