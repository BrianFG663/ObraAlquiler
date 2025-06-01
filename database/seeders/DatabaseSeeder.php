<?php

namespace Database\Seeders;

use App\Models\Assignment;
use App\Models\Machine;
use App\Models\Machinetype;
use App\Models\Maintenance;
use App\Models\Project;
use App\Models\Province;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        
        User::factory()->create();
        Province::factory(10)->create();
        Machinetype::factory(3)->create();
        Machine::factory(15)->create();
        Project::factory(10)->create();
        Assignment::factory(25)->create();
        Maintenance::factory(30)->create();
    }
}
