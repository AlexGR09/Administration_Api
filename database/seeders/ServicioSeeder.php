<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('servicios')->insert([
            [
                'id'=>1,
                'NombreServicio'=>'Servicio1',
                'CostoServicio'=>400,
            ],
        ]);
    }
}
