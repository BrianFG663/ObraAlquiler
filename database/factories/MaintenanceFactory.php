<?php

namespace Database\Factories;

use App\Models\Machine;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Maintenance>
 */
class MaintenanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'machine_id' => Machine::factory(),
        'maintenance_date' => $this->faker->date(),
        'kilometers_maintenances' => $this->faker->numberBetween(1000, 150000),
        'description' => $this->faker->sentence,
    ];
    }
}
