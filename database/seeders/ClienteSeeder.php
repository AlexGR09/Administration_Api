<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('clientes')->insert([
            [
                'id'=>1,
                'Titulo'=>'Dr.',
                'Foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'CURP'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'TipoTelefono'=>'Movil',
                'TelefonoCliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>5,
                'especialidad_id'=>1,
            ],
            [
                'id'=>2,
                'Titulo'=>'Dra.',
                'Foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'CURP'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'TipoTelefono'=>'Casa',
                'TelefonoCliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>6,
                'especialidad_id'=>3,
            ],
            [
                'id'=>3,
                'Titulo'=>'Dr.',
                'Foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'CURP'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'TipoTelefono'=>'Movil',
                'TelefonoCliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>7,
                'especialidad_id'=>1,
            ],
        ]);
    }
}
