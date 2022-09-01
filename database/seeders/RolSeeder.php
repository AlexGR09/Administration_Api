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
                'rol'=>'gerencia',
            ],
            [
                'id'=>2,
                'rol'=>'administracion',
            ],
            [
                'id'=>3,
                'rol'=>'contabilidad',
            ],
            [
                'id'=>4,
                'rol'=>'ventas',
            ],
            [
                'id'=>5,
                'rol'=>'cliente',
            ],
            [
                'id'=>6,
                'rol'=>'root',
            ],
        ]);
    }
}
