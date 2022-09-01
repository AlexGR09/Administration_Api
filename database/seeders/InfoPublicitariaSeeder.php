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
                'Logotipo'=>'aqui va el url',
                'Tipografia'=>'inserte tipografia',
                'PaletaColores'=>'aqui va la paleta de colores',
                'LlamadaConsulta'=>'aqui va la llamada',
                'InvitacionSitio'=>'aqui va la invitacion',
                'DatosConsulta'=>'aqui van los datos de la consulta',
            ],
            [
                'id' =>2,
                'Logotipo'=>'aqui va el url 2',
                'Tipografia'=>'inserte tipografia 2',
                'PaletaColores'=>'aqui va la paleta de colores 2',
                'LlamadaConsulta'=>'aqui va la llamada 2',
                'InvitacionSitio'=>'aqui va la invitacion 2',
                'DatosConsulta'=>'aqui van los datos de la consulta 2',
            ],
        ]);
    }
}
