<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;
/*use App\Models\Informe;
use App\Models\Certificacion;
use App\Models\Validacion;*/
use App\Models\practica;
use App\Models\user;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        User::factory(10)->create();
        practica::factory(50)->create();

    }
}
