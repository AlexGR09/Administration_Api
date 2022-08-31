<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        DB::table('users')->insert([
            [
                'id'=>1,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@guiasalud.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Arturo',
                'ApellidoPaterno'=>'Gonzalez',
                'ApellidoMaterno'=>'Delgado',
                'TeléfonoPersonal'=>$faker->regexify('961[0-4]{7}'),
                'FechaNacimiento'=>'1980-04-15',
                'Edad'=>'44',
                'Genero'=>'Masculino',
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ],
            [
                'id'=>2,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@guiasalud.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Diana',
                'ApellidoPaterno'=>'Salvador',
                'ApellidoMaterno'=>'Meza',
                'TeléfonoPersonal'=>$faker->regexify('984[0-4]{7}'),
                'FechaNacimiento'=>'1999-07-15',
                'Edad'=>'23',
                'Genero'=>'Femenino',
                'ciudad_id'=>1,
                'estado_id'=>1,
                'pais_id'=>1,
            ],
            [
                'id'=>3,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@guiasalud.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Pedro',
                'ApellidoPaterno'=>'Balmaceda',
                'ApellidoMaterno'=>'Pascal',
                'TeléfonoPersonal'=>$faker->regexify('974[0-4]{7}'),
                'FechaNacimiento'=>'1995-09-24',
                'Edad'=>'27',
                'Genero'=>'Masculino',
                'ciudad_id'=>1,
                'estado_id'=>1,
                'pais_id'=>1,
            ],
            [
                'id'=>4,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@guiasalud.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Veronica',
                'ApellidoPaterno'=>'Rios',
                'ApellidoMaterno'=>'Salado',
                'TeléfonoPersonal'=>$faker->regexify('999[0-4]{7}'),
                'FechaNacimiento'=>'1990-02-15',
                'Edad'=>'30',
                'Genero'=>'Femenino',
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ],
            [
                'id'=>5,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@gmail.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Joaquín',
                'ApellidoPaterno'=>'Ocampo',
                'ApellidoMaterno'=>'Ordoñez',
                'TeléfonoPersonal'=>$faker->regexify('556[0-4]{7}'),
                'FechaNacimiento'=>'1998-10-15',
                'Edad'=>'24',
                'Genero'=>'Masculino',
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ],
            [
                'id'=>6,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@gmail.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Selene',
                'ApellidoPaterno'=>'Delgado',
                'ApellidoMaterno'=>'Sanchez',
                'TeléfonoPersonal'=>$faker->regexify('655[0-4]{7}'),
                'FechaNacimiento'=>'1997-10-15',
                'Edad'=>'25',
                'Genero'=>'Femenino',
                'ciudad_id'=>2,
                'estado_id'=>2,
                'pais_id'=>1,
            ],
            [
                'id'=>7,
                'Username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->regexify('[a-z]{4}@gmail.com'),
                'password'=> $faker->regexify('[0-9]{9}'),
                'Nombre'=>'Esteban',
                'ApellidoPaterno'=>'Espinoza',
                'ApellidoMaterno'=>'Perez',
                'TeléfonoPersonal'=>$faker->regexify('556[0-4]{7}'),
                'FechaNacimiento'=>'2000-10-15',
                'Edad'=>'22',
                'Genero'=>'Masculino',
                'ciudad_id'=>1,
                'estado_id'=>1,
                'pais_id'=>1,
            ],
        ]);
    }
}
