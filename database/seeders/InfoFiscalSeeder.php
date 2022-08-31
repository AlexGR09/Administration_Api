<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class InfoFiscalSeeder extends Seeder
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
                'RazonSocial'=>'No recuerdo que iba aquí',
                'RFC'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{2}[0-9]{1}'),
                'TipoVialidad'=>'Avenida',
                'NombreVialidad'=>'Pancho Villa',
                'NumeroExterior'=>'56',
                'NumeroInterior'=>'No tiene',
                'TipoColonia'=>'Colonia',
                'NombreColonia'=>'Bienestar Social',
                'CP'=>'29088',
                'cliente_id'=>1,
                'ciudad_id'=>1,
                'estado_id'=>1,
                'pais_id'=>1,
            ],
            [
                'id'=>2,
                'RazonSocial'=>'No recuerdo que iba aquí x2',
                'RFC'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{2}[0-9]{1}'),
                'TipoVialidad'=>'Circunvlacion',
                'NombreVialidad'=>'Segunda',
                'NumeroExterior'=>'75',
                'NumeroInterior'=>'No tiene',
                'TipoColonia'=>'Privada',
                'NombreColonia'=>'Pencil',
                'CP'=>'20078',
                'cliente_id'=>2,
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ],
        ]);
    }
}
