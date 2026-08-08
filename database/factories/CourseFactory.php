<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Course;
use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Level;
use App\Models\Price;

/**
 * @extends Factory<Course>
 */
class CourseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $title = $this->faker->sentence();
        return [
            'title' => $title,
            'subtitle' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'status' => $this->faker->randomElement([Course::BORRADOR, Course::REVISION, Course::PUBLICADO]),
            'slug' => Str::slug($title),
            'category_id' => Category::all()->random()->id,
            'level_id' => Level::all()->random()->id,
            'price_id' => Price::all()->random()->id,
            'user_id' => User::all()->random()->id,
        ];
    }
}
