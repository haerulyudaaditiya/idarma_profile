<?php
namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ServiceFactory extends Factory
{
    protected $model = Service::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'name_service' => $this->faker->unique()->words(2, true),
            'icon' => 'assets/img/img_not_found.png', // default placeholder icon
            'description' => $this->faker->paragraph(2),
        ];
    }
}

?>
