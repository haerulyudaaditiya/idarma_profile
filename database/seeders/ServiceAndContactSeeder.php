<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;
use App\Models\Contact;

class ServiceAndContactSeeder extends Seeder
{
    public function run(): void
    {
        // Buat 10 service
        Service::factory(10)->create();

        // Buat 30 kontak acak berdasarkan service yang ada
        Contact::factory(30)->create();
    }
}

?>
