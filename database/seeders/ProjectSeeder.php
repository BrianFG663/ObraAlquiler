<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // 5 con `end_date`
        Project::factory()->count(5)->create([
            'end_date' => now()->subDays(rand(1, 365)),
        ]);

        // 5 sin `end_date`
        Project::factory()->count(5)->create([
            'end_date' => null,
        ]);
    }
}
