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
                'razonsocial'=>'No recuerdo que iba aquí',
                'rfc'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{2}[0-9]{1}'),
                'tipovialidad'=>'Avenida',
                'nombrevialidad'=>'Pancho Villa',
                'numeroexterior'=>'56',
                'numerointerior'=>'No tiene',
                'tipocolonia'=>'Colonia',
                'nombrecolonia'=>'Bienestar Social',
                'cp'=>'29088',
                'cliente_id'=>1,
                'municipio_id'=>1,
                
            ],
            [
                'id'=>2,
                'razonsocial'=>'No recuerdo que iba aquí x2',
                'rfc'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{2}[0-9]{1}'),
                'tipovialidad'=>'Circunvlacion',
                'nombrevialidad'=>'Segunda',
                'numeroexterior'=>'75',
                'numerointerior'=>'No tiene',
                'tipocolonia'=>'Privada',
                'nombrecolonia'=>'Pencil',
                'cp'=>'20078',
                'cliente_id'=>2,
                'municipio_id'=>2,
            ],
        ]);
    }
}
