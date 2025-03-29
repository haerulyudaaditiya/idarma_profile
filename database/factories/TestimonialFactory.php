<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class TestimonialFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name' => $this->faker->name(),
            'rating' => (string) $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->sentence(15),
        ];
    }
}
