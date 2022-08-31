<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empleados')->insert([
            [
                'id'=>1,
                'user_id'=>2,
            ],
            [
                'id'=>2,
                'user_id'=>3,
            ],
        ]);
    }
}
