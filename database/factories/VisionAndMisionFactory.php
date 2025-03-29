<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class VisionAndMisionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'vision' => $this->faker->sentence(10),
            'mision' => collect([
                '<ul>',
                '<li>' . $this->faker->sentence(6) . '</li>',
                '<li>' . $this->faker->sentence(6) . '</li>',
                '<li>' . $this->faker->sentence(6) . '</li>',
                '</ul>',
            ])->implode("\n"),
        ];
    }
}
