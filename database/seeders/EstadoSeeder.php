<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            [
                "id" => 1,
                "nombre" => "Aguascalientes",
                "pais_id" => 1
            ],
            [
                "id" => 2,
                "nombre" => "Baja California",
                "pais_id" => 1
            ],
            [
                "id" => 3,
                "nombre" => "Baja California Sur",
                "pais_id" => 1
            ],
            [
                "id" => 4,
                "nombre" => "Campeche",
                "pais_id" => 1
            ],
            [
                "id" => 5,
                "nombre" => "Chiapas",
                "pais_id" => 1
            ],
            [
                "id" => 6,
                "nombre" => "Chihuahua",
                "pais_id" => 1
            ],
            [
                "id" => 7,
                "nombre" => "Coahuila",
                "pais_id" => 1
            ],
            [
                "id" => 8,
                "nombre" => "Colima",
                "pais_id" => 1
            ],
            [
                "id" => 9,
                "nombre" => "Distrito Federal",
                "pais_id" => 1
            ],
            [
                "id" => 10,
                "nombre" => "Durango",
                "pais_id" => 1
            ],
            [
                "id" => 11,
                "nombre" => "Estado de Mexico",
                "pais_id" => 1
            ],
            [
                "id" => 12,
                "nombre" => "Guanajuato",
                "pais_id" => 1
            ],
            [
                "id" => 13,
                "nombre" => "Guerrero",
                "pais_id" => 1
            ],
            [
                "id" => 14,
                "nombre" => "Hidalgo",
                "pais_id" => 1
            ],
            [
                "id" => 15,
                "nombre" => "Jalisco",
                "pais_id" => 1
            ],
            [
                "id" => 16,
                "nombre" => "Mexico",
                "pais_id" => 1
            ],
            [
                "id" => 17,
                "nombre" => "Michoacan",
                "pais_id" => 1
            ],
            [
                "id" => 18,
                "nombre" => "Morelos",
                "pais_id" => 1
            ],
            [
                "id" => 19,
                "nombre" => "Nayarit",
                "pais_id" => 1
            ],
            [
                "id" => 20,
                "nombre" => "Nuevo Leon",
                "pais_id" => 1
            ],
            [
                "id" => 21,
                "nombre" => "Oaxaca",
                "pais_id" => 1
            ],
            [
                "id" => 22,
                "nombre" => "Puebla",
                "pais_id" => 1
            ],
            [
                "id" => 23,
                "nombre" => "Queretaro",
                "pais_id" => 1
            ],
            [
                "id" => 24,
                "nombre" => "Quintana Roo",
                "pais_id" => 1
            ],
            [
                "id" => 25,
                "nombre" => "San Luis Potosi",
                "pais_id" => 1
            ],
            [
                "id" => 26,
                "nombre" => "Sinaloa",
                "pais_id" => 1
            ],
            [
                "id" => 27,
                "nombre" => "Sonora",
                "pais_id" => 1
            ],
            [
                "id" => 28,
                "nombre" => "Tabasco",
                "pais_id" => 1
            ],
            [
                "id" => 29,
                "nombre" => "Tamaulipas",
                "pais_id" => 1
            ],
            [
                "id" => 30,
                "nombre" => "Tlaxcala",
                "pais_id" => 1
            ],
            [
                "id" => 31,
                "nombre" => "Veracruz",
                "pais_id" => 1
            ],
            [
                "id" => 32,
                "nombre" => "Yucatan",
                "pais_id" => 1
            ],
            [
                "id" => 33,
                "nombre" => "Zacatecas",
                "pais_id" => 1
            ]
        ]);
    }
}
