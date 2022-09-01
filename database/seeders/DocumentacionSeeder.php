<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('documentaciones')->insert([
            [
                'id'=>1,
                'ine'=>'Aqui va una foto',
                'cedula'=>'Aqui va la cedula',
                'titulo'=>'Aqui va la foto del titulo',
                'comprobantedomicilio'=>'Foto del comprobante de domicilio',
                'constanciafiscal'=>'Foto de la constancia fiscal',
                'certificados'=>'Foto de cualquier certificado que tengan',
                'cliente_id'=>1,
                'info_fiscal_id'=>1,
            ],
        ]);
    }
}
