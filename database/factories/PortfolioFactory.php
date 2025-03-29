<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PortfolioFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'title' => $this->faker->words(2, true), // contoh: "App Project"
            'image' => 'assets/img/img_not_found.png', // default path (ganti sesuai struktur kamu)
        ];
    }
}
