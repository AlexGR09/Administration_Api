<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RedSocialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('redes_sociales')->insert([
            [
                'id'=>1,
                'tipo'=>'Facebook',
                'url'=>'Aqui va un URL',
                'usuario'=>'Usuario1',
                'password'=>'Contraseña',
                'cliente_id'=>1
            ],
        ]);
    }
}
