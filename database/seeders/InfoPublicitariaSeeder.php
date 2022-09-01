<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InfoPublicitariaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('info_publicitarias')->insert([
            [
                'id' =>1,
                'logotipo'=>'aqui va el url',
                'tipografia'=>'inserte tipografia',
                'paletacolores'=>'aqui va la paleta de colores',
                'llamadaconsulta'=>'aqui va la llamada',
                'invitacionsitio'=>'aqui va la invitacion',
                'datosconsulta'=>'aqui van los datos de la consulta',
            ],
            [
                'id' =>2,
                'logotipo'=>'aqui va el url 2',
                'tipografia'=>'inserte tipografia 2',
                'paletacolores'=>'aqui va la paleta de colores 2',
                'llamadaconsulta'=>'aqui va la llamada 2',
                'invitacionsitio'=>'aqui va la invitacion 2',
                'datosconsulta'=>'aqui van los datos de la consulta 2',
            ],
        ]);
    }
}
