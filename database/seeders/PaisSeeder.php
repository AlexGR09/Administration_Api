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
        DB::table('paises')->insert([
            [
                'id'=>1,
                'nombre'=>'México',
                'short' => 'mx',
                'phonecode' => 52,
            ],
        ]);
    }
}
