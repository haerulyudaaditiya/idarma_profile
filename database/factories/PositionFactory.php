<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PositionFactory extends Factory
{
    protected $model = Position::class;

    public function definition(): array
    {
        return [
            'name_position' => $this->faker->jobTitle,
            'serial' => strtoupper(Str::random(6)),
            'structure' => $this->faker->randomElement(['Struktur A', 'Struktur B', 'Struktur C']),
        ];
    }
}
