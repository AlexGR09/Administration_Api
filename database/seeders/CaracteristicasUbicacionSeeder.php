<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class CaracteristicasUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('caracteristicas_ubicaciones')->insert([
            [
                'id'=>1,
                'turno'=>'matutino',
                'promediopacientes'=>60,
                'capacidadmaxima'=>100,
                'nivelcompetencia'=>'Alta',
                'precioconsultacompetencia'=>500,
                'ubicacion_id'=>1,
            ],
        ]);
    }
}
