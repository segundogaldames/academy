<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Storage::disk('public')->deleteDirectory('courses');
        Storage::disk('public')->makeDirectory('courses');

        $this->call([
            PermissionSeeder::class, // 1º Crea los 11 permisos
            RoleSeeder::class,       // 2º Crea Admin (con los 11) e Instructor (con los 4 de cursos)
            UserSeeder::class,       // 3º Crea usuarios
            LevelSeeder::class,
            CategorySeeder::class,
            PriceSeeder::class,
            PlatformSeeder::class,
            CourseSeeder::class,
        ]);
    }
}
