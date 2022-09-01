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
                'Turno'=>'Matutino',
                'PromedioPacientes'=>60,
                'CapacidadMaxima'=>100,
                'NivelCompetencia'=>'Alta',
                'PrecioConsultaCompetencia'=>500,
                'ubicacion_id'=>1,
            ],
        ]);
    }
}
