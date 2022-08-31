<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            [
                'id'=>1,
                'nombre'=>'Chiapas',
                'pais_id'=>1,
            ],
            [
                'id'=>2,
                'nombre'=>'Puebla',
                'pais_id'=>1,
            ],
            [
                'id'=>3,
                'nombre'=>'Texas',
                'pais_id'=>2,
            ],
            [
                'id'=>4,
                'nombre'=>'Antioquía',
                'pais_id'=>3,
            ],
            [
                'id'=>5,
                'nombre'=>'Quiche',
                'pais_id'=>4,
            ],
            [
                'id'=>6,
                'nombre'=>'La Habana',
                'pais_id'=>5,
            ],
        ]);
    }
}
