<?php

namespace Database\Seeders;

use App\Models\Assignment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 10 con end_date, end_reason y kilometers
        Assignment::factory()->count(10)->create([
            'end_date' => now()->subDays(rand(1, 180)),
            'end_reason' => fake()->randomElement(['Proyecto finalizado', 'Reemplazo', 'Mantenimiento']),
            'kilometers' => fake()->numberBetween(1000, 10000),
        ]);

        // 10 sin esos campos (null)
        Assignment::factory()->count(10)->create([
            'end_date' => null,
            'end_reason' => null,
            'kilometers' => null,
        ]);
    }
}
