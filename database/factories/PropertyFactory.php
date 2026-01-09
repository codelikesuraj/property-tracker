<?php

namespace Database\Factories;

use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Property>
 */
class PropertyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bedrooms = $this->faker->numberBetween(
            config('property-types.bedroom_range.min'),
            config('property-types.bedroom_range.max')
        );

        $type = $this->faker->randomElement(
            config('property-types.types')
        );

        return [
            'title' => "{$bedrooms}-bedroom {$type}",
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(0, 50000, 5000000),
            'units' => fake()->numberBetween(1, 10),
            'project_id' => Project::factory(),
            'created_by' => User::factory(),
        ];
    }
}
