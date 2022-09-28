<?php

namespace Database\Seeders;

use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class InfoFiscalUbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('info_fiscales')->insert([
            [
                'id'=>1,
                'razonsocial'=>'No recuerdo que iba aquí',
                'rfc'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{2}[0-9]{1}'),
                'tipovialidad'=>'Avenida',
                'nombrevialidad'=>'Pancho Villa',
                'numeroexterior'=>'56',
                'numerointerior'=>'No tiene',
                'tipocolonia'=>'Colonia',
                'nombrecolonia'=>'Bienestar Social',
                'cp'=>'29088',
                'ubicacion_id'=>1,
                'municipio_id'=>1,
            ],
        ]);
    }
}
