<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PaisSeeder::class);
        $this->call(EstadoSeeder::class);
        $this->call(CiudadSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RolUsuariosSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(FreelancerSeeder::class);
        $this->call(InfoFiscalSeeder::class);
    }
}
