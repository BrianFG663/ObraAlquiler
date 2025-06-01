<?php

namespace Database\Factories;

use App\Models\Machine;
use App\Models\Project;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Assignment>
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
        $start = $this->faker->dateTimeBetween('-1 year', 'now');
        $end = $this->faker->optional()->dateTimeBetween($start, 'now');

        return [
        'machine_id' => Machine::factory(),
        'project_id' => Project::factory(),
        'user_id' => 1,
        'start_date' => $start->format('Y-m-d'),
        'end_date' => $end ? $end->format('Y-m-d') : null,
        'end_reason' => $this->faker->optional()->sentence,
        'kilometers' => $this->faker->numberBetween(100, 10000),
    ];
    }
}
