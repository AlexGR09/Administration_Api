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
                'Especialidad'=>'Cardiología',
            ],
            [
                'id'=>2,
                'Especialidad'=>'Psiquiatría',
            ],
            [
                'id'=>3,
                'Especialidad'=>'Algología',
            ],
            [
                'id'=>4,
                'Especialidad'=>'Urología',
            ],
        ]);
    }
}
