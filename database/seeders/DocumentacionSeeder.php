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
                'INE'=>'Aqui va una foto',
                'Cedula'=>'Aqui va la cedula',
                'Titulo'=>'Aqui va la foto del titulo',
                'ComporbanteDomicilio'=>'Foto del comprobante de domicilio',
                'ConstanciaFiscal'=>'Foto de la constancia fiscal',
                'Certificados'=>'Foto de cualquier certificado que tengan',
                'cliente_id'=>1,
                'info_fiscal_id'=>1,
            ],
        ]);
    }
}
