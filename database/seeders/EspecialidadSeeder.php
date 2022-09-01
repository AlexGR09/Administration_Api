<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EspecialidadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('especialidades')->insert([
            [
                'id'=>1,
                'especialidad'=>'Cardiología',
            ],
            [
                'id'=>2,
                'especialidad'=>'Psiquiatría',
            ],
            [
                'id'=>3,
                'especialidad'=>'Algología',
            ],
            [
                'id'=>4,
                'especialidad'=>'Urología',
            ],
        ]);
    }
}
