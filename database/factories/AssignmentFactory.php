<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignments>
 */
class AssignmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $startDate = $this->faker->dateTimeBetween('-1 years', 'now');

        return [
            'machine_id' => Machine::inRandomOrder()->first()->id,
            'project_id' => Project::inRandomOrder()->first()->id,
            'user_id' => User::inRandomOrder()->first()->id,
            'start_date' => $startDate->format('Y-m-d'),
            'end_date' => null, // por defecto null, se setea en el seeder para algunos
            'end_reason' => null,
            'kilometers' => null,
        ];
    }
}
