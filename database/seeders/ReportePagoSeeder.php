<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class ReportePagoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker= Faker::create();

        DB::table('reporte_pagos')->insert([
            [
                'id'=>1,
                'reporte_id'=>1,
                'pago_id'=>1,
                'info_fiscal_id'=>1,
                'cliente_id'=>1,
                'paquete_id'=>1,
            ],
        ]);
    }
}
