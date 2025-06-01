<?php

namespace Database\Factories;

use App\Models\Machinetype;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Machine>
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
        'serial_number' => $this->faker->unique()->numerify('SN-####'),
        'machinetype_id' => Machinetype::inRandomOrder()->first()?->id ?? Machinetype::factory(),
        'model' => $this->faker->word,
        'maintenance_km' => $this->faker->numberBetween(1000, 5000),
        'life_time_km' => $this->faker->numberBetween(10000, 200000),
    ];
    }
}
