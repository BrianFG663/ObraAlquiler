<?php

namespace Database\Factories;

use App\Models\Province;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Projects>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         $startDate = $this->faker->dateTimeBetween('-2 years', 'now');

        return [
            'name' => $this->faker->company . ' Project',
            'province_id' => Province::inRandomOrder()->first()->id,
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => null, // Se sobrescribe desde el seeder si es necesario
        ];
    }
}
