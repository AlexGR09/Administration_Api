<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ClienteEspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        DB::table('cliente_especialidad')->insert([
            [
                'id'=>1,
                'cliente_id'=>1,
                'especialidad_id'=>1,
            ],
            [
                'id'=>2,
                'cliente_id'=>2,
                'especialidad_id'=>3,
            ],
            [
                'id'=>3,
                'cliente_id'=>3,
                'especialidad_id'=>1,
            ],
        ]);
    }
}
