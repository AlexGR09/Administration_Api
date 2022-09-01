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
                'Tipo'=>'Laboratorio',
                'NombreUbicaciones'=>'Aqui va el nombre de la ubicacion',
                'COFEPRISFunc'=>'Aqui va el COFEPRISFunc',
                'COFEPRISPubli'=>'Aqui va el COFEPRISPubli',
                'Email'=>$faker->regexify('[a-z]{4}@guiasalud.com'),
                'TelefonoCitas'=>$faker->regexify('961[0-4]{7}'),
                'TipoTelefono'=>'Oficina',
                'TelefonoEmergencias'=>$faker->regexify('961[0-4]{7}'),
                'ImagenUbicacion'=>'Aqui va la direccion de la foto',
                'TipoVialidad'=>'Avenida',
                'NombreVialidad'=>'Cañitas',
                'NumeroExterior'=>78,
                'NumeroInterior'=>'No tiene',
                'TipoColonia'=>'Fraccionamiento',
                'NombreColonia'=>'San Marcos',
                'CP'=>21038,
                'cliente_id'=>1,
                'info_fiscal_id'=>1,
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ]
        ]);
    }
}
