<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Limpiar la caché de permisos de Spatie
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // 2. Crear Rol Admin y asignarle TODOS los permisos de la BD
        $admin = Role::create([
            'name' => 'Admin'
        ]);
        $admin->givePermissionTo(Permission::all());

        // 3. Crear Rol Instructor
        $instructor = Role::create([
            'name' => 'Instructor'
        ]);

        // 4. Asignarle al Instructor solo los permisos de cursos
        $instructor->syncPermissions([
            'Crear cursos',
            'Leer cursos',
            'Actualizar cursos',
            'Eliminar cursos',
        ]);
    }
}
