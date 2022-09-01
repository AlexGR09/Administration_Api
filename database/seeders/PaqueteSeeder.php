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
                'nombrepaquete'=>'paquete 1',
                'costopaquete'=>2000,
            ],
        ]);
    }
}
