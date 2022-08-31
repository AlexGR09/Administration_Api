<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CiudadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ciudades')->insert([
            [
                'id'=>1,
                'nombre'=>'Tuxtla Gutiérrez',
                'estado_id'=>1,
                'pais_id'=>1,
            ],
            [
                'id'=>2,
                'nombre'=>'Cholula',
                'estado_id'=>2,
                'pais_id'=>1,
            ]
        ]);
    }
}
