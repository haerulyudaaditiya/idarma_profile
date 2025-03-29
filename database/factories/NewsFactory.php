<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    protected $model = News::class;

    public function definition(): array
    {
        return [
            'news_category_id' => NewsCategory::inRandomOrder()->first()->id,
            'title' => $this->faker->unique()->sentence(),
            'content' => $this->faker->paragraph(5),
            'cover' => 'news_covers/default.jpg',
        ];
    }
}
