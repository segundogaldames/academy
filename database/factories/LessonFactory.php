<?php

namespace Database\Factories;

use App\Models\Lesson;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Lesson>
 */
class LessonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(),
            'url' => 'https://youtu.be/cCnPXNB8q0w',
            'iframe' => '<iframe width="1337" height="752" src="https://www.youtube.com/embed/cCnPXNB8q0w" title="Java + MySQL | Proyecto Automotora | EP. 18 | Probamos los módulos de Marcas y Modelos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>',
            'platform_id' => 1,
        ];
    }
}
