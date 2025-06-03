<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machines>
 */
class MachineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         return [
            'model' => $this->faker->bothify('Modelo-??##'),
            'serial_number' => 'SN-' . str_pad($this->faker->unique()->numberBetween(0, 9999), 4, '0', STR_PAD_LEFT),
            'maintenance_km' => $this->faker->numberBetween(500, 2000),
            'life_time_km' => $this->faker->numberBetween(10000, 50000),
            'machinetype_id' => null,
        ];
    }
}
