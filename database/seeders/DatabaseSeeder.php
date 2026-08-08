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
            UserSeeder::class,
        ]);

        $this->call([
            LevelSeeder::class,
        ]);

        $this->call([
            CategorySeeder::class,
        ]);

        $this->call([
            PriceSeeder::class,
        ]);

        $this->call([
            PlatformSeeder::class,
        ]);

        $this->call([
            CourseSeeder::class,
        ]);
    }
}
