<?php

namespace Database\Seeders;

use App\Models\News;
use App\Models\NewsComment;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsCommentSeeder extends Seeder
{
    public function run(): void
    {
        $newsList = News::all();

        foreach ($newsList as $news) {
            // Buat 5 komentar utama (tanpa parent)
            $parentComments = NewsComment::factory()->count(5)->create([
                'news_id' => $news->id,
                'parent_id' => null,
            ]);

            // Buat 1-2 reply untuk sebagian komentar utama
            foreach ($parentComments->take(3) as $parent) {
                NewsComment::factory()->count(rand(1, 2))->create([
                    'news_id' => $news->id,
                    'parent_id' => $parent->id,
                ]);
            }

            // Tambahkan beberapa komentar (2-3) yang menjadi reply dari reply (nested)
            foreach ($parentComments->take(2) as $top) {
                $firstReply = NewsComment::factory()->create([
                    'news_id' => $news->id,
                    'parent_id' => $top->id,
                ]);

                NewsComment::factory()->count(2)->create([
                    'news_id' => $news->id,
                    'parent_id' => $firstReply->id,
                ]);
            }
        }
    }
}
