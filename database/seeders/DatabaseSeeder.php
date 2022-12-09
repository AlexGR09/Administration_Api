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
        $this->call(MunicipioSeeder::class);
        $this->call(RolSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(RolUsuariosSeeder::class);
        $this->call(EmpleadoSeeder::class);
        $this->call(EspecialidadSeeder::class);
        $this->call(ClienteSeeder::class);
        $this->call(FreelancerSeeder::class);
        $this->call(InfoFiscalSeeder::class);
        $this->call(InfoPublicitariaSeeder::class);
        $this->call(RedSocialSeeder::class);
        $this->call(PaqueteSeeder::class);
        $this->call(PagoSeeder::class);
        $this->call(ReporteSeeder::class);
        $this->call(ReportePagoSeeder::class);
        $this->call(ServicioSeeder::class);
        $this->call(ContenidoPaqueteSeeder::class);
        $this->call(UbicacionSeeder::class);
        $this->call(CaracteristicasUbicacionSeeder::class);
        $this->call(PermisoSeeder::class);
        $this->call(PermisionableSeeder::class);
        $this->call(ClienteEspecialidadSeeder::class);
        $this->call(InfoFiscalUbicacionSeeder::class);
    }
}
