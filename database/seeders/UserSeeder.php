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
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Gonzalez',
                'apellidomaterno'=>'Delgado',
                'telefonopersonal'=>$faker->regexify('961[0-4]{7}'),
                'fechanacimiento'=>'1980-04-15',
                'edad'=>'44',
                'genero'=>'Masculino',
                'municipio_id'=>2,
                
            ],
            [
                'id'=>2,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Salvador',
                'apellidomaterno'=>'Meza',
                'telefonopersonal'=>$faker->regexify('984[0-4]{7}'),
                'fechanacimiento'=>'1999-07-15',
                'edad'=>'23',
                'genero'=>'Femenino',
                'municipio_id'=>1,
                
            ],
            [
                'id'=>3,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Balmaceda',
                'apellidomaterno'=>'Pascal',
                'telefonopersonal'=>$faker->regexify('974[0-4]{7}'),
                'fechanacimiento'=>'1995-09-24',
                'edad'=>'27',
                'genero'=>'Masculino',
                'municipio_id'=>1,
                
            ],
            [
                'id'=>4,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Rios',
                'apellidomaterno'=>'Salado',
                'telefonopersonal'=>$faker->regexify('999[0-4]{7}'),
                'fechanacimiento'=>'1990-02-15',
                'edad'=>'30',
                'genero'=>'Femenino',
                'municipio_id'=>2,
                
            ],
            [
                'id'=>5,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Ocampo',
                'apellidomaterno'=>'Ordoñez',
                'telefonopersonal'=>$faker->regexify('556[0-4]{7}'),
                'fechanacimiento'=>'1998-10-15',
                'edad'=>'24',
                'genero'=>'Masculino',
                'municipio_id'=>2,
                
            ],
            [
                'id'=>6,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Delgado',
                'apellidomaterno'=>'Sanchez',
                'telefonopersonal'=>$faker->regexify('655[0-4]{7}'),
                'fechanacimiento'=>'1997-10-15',
                'edad'=>'25',
                'genero'=>'Femenino',
                'municipio_id'=>2,
                
            ],
            [
                'id'=>7,
                'username'=> $faker->regexify('[A-Z]{8}'),
                'email'=> $faker->email,
                'password'=> $faker->regexify('[0-9]{9}'),
                'nombre'=>$faker->name,
                'apellidopaterno'=>'Espinoza',
                'apellidomaterno'=>'Perez',
                'telefonopersonal'=>$faker->regexify('556[0-4]{7}'),
                'fechanacimiento'=>'2000-10-15',
                'edad'=>'22',
                'genero'=>'Masculino',
                'municipio_id'=>1,
                
            ],
        ]);
    }
}
