<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Jefe Proceso']);
        
        // Crear permisos
        Permission::create(['name' => 'admin.home'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'practicas'])->syncRoles([$role1, $role2]);

        // En caso que tu ruta tenga otro nombre diferente al grupal "practicas"
        /*
        Permission::create(['name' => 'practicas.index']);
        Permission::create(['name' => 'practicas.create']);
        Permission::create(['name' => 'practicas.edit']);
        Permission::create(['name' => 'practicas.destroy']);
        */
        // Para asignar roles a los permisos, solo se debe agregar los siguiente comandos

        /*
        Para cuando solo es un rol
        Permission::create(['name' => 'practicas'])->assignRole($role1);

        Para cuando son de 2 a mas roles
        Permission::create(['name' => 'practicas'])->syncRoles([$role1, $role2]);
        */

    }
}
