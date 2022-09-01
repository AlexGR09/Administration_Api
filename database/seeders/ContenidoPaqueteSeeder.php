<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContenidoPaqueteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('contenido_paquetes')->insert([
            [
                'id'=>1,
                'Descripcion'=>'Esto es el paquete',
                'paquete_id'=>1,
                'servicio_id'=>1,
            ],
        ]);
    }
}
