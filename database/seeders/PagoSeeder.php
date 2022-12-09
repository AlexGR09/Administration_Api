<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pagos')->insert([
            [
                'id'=>1,
                'metodopago'=>'Paypal',
                'fechapago'=>'2022-08-20',
                'periodostiempo'=>'Mensual',
                'monto'=>1500,
                'cliente_id'=>1,
                'info_fiscal_id'=>1,
                'paquete_id'=>1,
            ],
        ]);
    }
}


                /* 
                {
                    "metodopago" : "Paypal",
                    "fechapago" : "2022-08-20",
                    "periodostiempo" : "Mensual",
                    "monto" : "1500,
                } 
                */