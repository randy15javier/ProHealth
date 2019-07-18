<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Medical_Date;
use App\Doctor;
use App\Receptionist;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Medical_Date::truncate();
        Doctor::truncate();
        Receptionist::truncate();

        $cantidadUsuarios = 100;
        $cantidadCitasMedicas = 100;
        $cantidadDoctores = 100;
        $cantidadRecepcionistas = 10;

        factory(User::class, $cantidadUsuarios)->create();
        factory(Medical_Date::class, $cantidadCitasMedicas)->create();
        factory(Doctor::class, $cantidadDoctores)->create();
        factory(Receptionist::class, $cantidadRecepcionistas)->create();

    }
}

