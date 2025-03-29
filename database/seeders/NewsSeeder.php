<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\Tag;
use App\Models\NewsCategory;
use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    public function run(): void
    {
        NewsCategory::factory()->count(5)->create();
        Tag::factory()->count(10)->create();

        News::factory()
            ->count(30)
            ->create()
            ->each(function ($news) {
                $tags = Tag::inRandomOrder()->take(rand(1, 4))->pluck('id');
                $news->tags()->sync($tags);
            });
    }
}
