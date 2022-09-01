<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('paquetes')->insert([
            [
                'id'=>1,
                'NombrePaquete'=>'paquete 1',
                'CostoPaquete'=>2000,
            ],
        ]);
    }
}
