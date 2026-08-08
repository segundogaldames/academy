<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Price;

class PriceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Price::create([
            'name' => 'Gratis',
            'price' => 0,
        ]);

        Price::create([
            'name' => 'Básico',
            'price' => 19900,
        ]);

        Price::create([
            'name' => 'Intermedio',
            'price' => 49900,
        ]);

        Price::create([
            'name' => 'Avanzado',
            'price' => 99900,
        ]);
    }
}
