<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            [
                'id'=>1,
                'rol'=>'root',
            ],
            [
                'id'=>2,
                'rol'=>'gerencia',
            ],
            [
                'id'=>3,
                'rol'=>'administracion',
            ],
            [
                'id'=>4,
                'rol'=>'contabilidad',
            ],
            [
                'id'=>5,
                'rol'=>'ventas',
            ],
            [
                'id'=>6,
                'rol'=>'cliente',
            ],
        ]);
    }
}
