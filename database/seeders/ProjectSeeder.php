<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Property;
use App\Models\User;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get a random user to be the creator
        $user = User::query()->inRandomOrder()->first();

        // Create 10 projects with properties
        Project::factory()
            ->count(10)
            ->has(Property::factory()->count(5), 'properties')
            ->create(['created_by' => $user->id]);

        // Create 5 projects without properties
        Project::factory()
            ->count(5)
            ->create(['created_by' => $user->id]);
    }
}
