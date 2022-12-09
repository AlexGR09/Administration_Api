<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class PermisionableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('permisionables')->insert([
            //ROOT
            [ 'permisionable_id' => 1, 'permisionable_type' => 'App\Models\Role', 'permiso_id' => 1, 'c' => 1,'r' => 1,'u' => 1,'d' => 1 ],
            //Admin
            [ 'permisionable_id' => 3, 'permisionable_type' => 'App\Models\Role', 'permiso_id' => 2, 'c' => 1,'r' => 1,'u' => 1,'d' => 1 ],
        ]);
    }
}
