<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VisionAndMision;

class VisionAndMisionSeeder extends Seeder
{
    public function run(): void
    {
        VisionAndMision::factory()->count(1)->create();
    }
}
