<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UbicacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        DB::table('ubicaciones')->insert([
            [
                'id'=>1,
                'tipo'=>'Laboratorio',
                'nombreubicaciones'=>'Aqui va el nombre de la ubicacion',
                'cofeprisfunc'=>'Aqui va el COFEPRISFunc',
                'cofeprispubli'=>'Aqui va el COFEPRISPubli',
                'email'=>$faker->regexify('[a-z]{4}@guiasalud.com'),
                'telefonocitas'=>$faker->regexify('961[0-4]{7}'),
                'tipotelefono'=>'Oficina',
                'telefonoemergencias'=>$faker->regexify('961[0-4]{7}'),
                'imagenubicacion'=>'Aqui va la direccion de la foto',
                'tipovialidad'=>'Avenida',
                'nombrevialidad'=>'Cañitas',
                'numeroexterior'=>78,
                'numerointerior'=>'No tiene',
                'tipocolonia'=>'Fraccionamiento',
                'nombrecolonia'=>'San Marcos',
                'cp'=>21038,
                'cliente_id'=>1,
                'info_fiscal_id'=>1,
                'ciudad_id'=>2,
                
            ]
        ]);
    }
}
