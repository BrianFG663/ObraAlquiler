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
            'machine_id' => Machine::inRandomOrder()->first()->id, // puede ser sobrescrito en el seeder
            'maintenance_date' => $this->faker->dateTimeBetween('-2 years', 'now')->format('Y-m-d'),
            'kilometers_maintenances' => $this->faker->numberBetween(1000, 20000),
            'description' => $this->faker->sentence(6),
        ];
    }
}
