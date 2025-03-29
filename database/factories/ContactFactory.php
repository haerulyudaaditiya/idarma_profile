<?php
namespace Database\Factories;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition(): array
    {
        return [
            'id' => Str::uuid(),
            'service_id' => Service::inRandomOrder()->first()->id ?? Service::factory(),
            'name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'telp' => $this->faker->phoneNumber(),
            'message' => $this->faker->sentence(10),
        ];
    }
}

?>
