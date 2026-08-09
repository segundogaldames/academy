<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create([
            'name' => 'Crear cursos'
        ]);

        Permission::create([
            'name' => 'Leer cursos'
        ]);

        Permission::create([
            'name' => 'Actualizar cursos'
        ]);

        Permission::create([
            'name' => 'Eliminar cursos'
        ]);

        Permission::create([
            'name' => 'Ver dashboard'
        ]);

        Permission::create([
            'name' => 'Crear roles'
        ]);

        Permission::create([
            'name' => 'Leer roles'
        ]);

        Permission::create([
            'name' => 'Editar roles'
        ]);

        Permission::create([
            'name' => 'Eliminar roles'
        ]);

        Permission::create([
            'name' => 'Leer usuarios'
        ]);

        Permission::create([
            'name' => 'Editar usuarios'
        ]);
    }
}
