<?php

namespace Database\Factories;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class NewsCommentFactory extends Factory
{
    protected $model = NewsComment::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'news_id' => News::inRandomOrder()->first()?->id ?? News::factory(),
            'name' => $this->faker->name,
            'comment' => $this->faker->paragraph,
            'parent_id' => null, // default komentar utama
        ];
    }

    public function reply($newsId, $parentId)
    {
        return $this->state([
            'id' => Str::uuid(),
            'news_id' => $newsId,
            'parent_id' => $parentId,
            'name' => $this->faker->name,
            'comment' => $this->faker->sentence,
        ]);
    }
}
