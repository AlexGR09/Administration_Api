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
                'titulo'=>'Dr.',
                'foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'curp'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'tipotelefono'=>'movil',
                'telefonocliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>5,
            ],
            [
                'id'=>2,
                'titulo'=>'Dra.',
                'foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'curp'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'tipotelefono'=>'casa',
                'telefonocliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>6,
            ],
            [
                'id'=>3,
                'titulo'=>'Dr.',
                'foto'=> $faker->regexify('[a-z]{5}.[a-h]{3}'),
                'curp'=> $faker->regexify('[A-Z]{4}[0-9]{6}[A-Z]{6}[0-9]{2}'),
                'tipotelefono'=>'movil',
                'telefonocliente'=>$faker->regexify('961[0-9]{7}'),
                'user_id'=>7,
            ],
        ]);
    }
}
