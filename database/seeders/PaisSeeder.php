<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('paises')->insert([
            [
                'id'=>1,
                'nombre'=>'México',
            ],
            [
                'id'=>2,
                'nombre'=>'Estados Unidos',
            ],
            [
                'id'=>3,
                'nombre'=>'Colombia',
            ],
            [
                'id'=>4,
                'nombre'=>'Guatemala',
            ],
            [
                'id'=>5,
                'nombre'=>'Cuba',
            ],
        ]);
    }
}
