<?php

namespace Database\Seeders;

use App\Models\Client;
use App\Models\Property;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 20 clients
        Client::factory()
            ->count(20)
            ->create()
            ->each(function (Client $client) {
                // Randomly attach 1-3 properties to each client
                $propertyIds = Property::query()->inRandomOrder()->limit(rand(1, 3))->pluck('id');
                $client->properties()->attach($propertyIds);
            });
    }
}
