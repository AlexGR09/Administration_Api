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
                'Rol'=>'Gerencia',
            ],
            [
                'id'=>2,
                'Rol'=>'Administracion',
            ],
            [
                'id'=>3,
                'Rol'=>'Contabilidad',
            ],
            [
                'id'=>4,
                'Rol'=>'Ventas',
            ],
            [
                'id'=>5,
                'Rol'=>'Cliente',
            ],
            [
                'id'=>6,
                'Rol'=>'Root',
            ],
        ]);
    }
}
