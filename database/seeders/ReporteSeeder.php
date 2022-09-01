<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReporteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reportes')->insert([
            [
                'id'=>1,
                'Fecha'=>'2022-08-22',
                'MontoTotal'=>1000,
            ],
        ]);
    }
}
