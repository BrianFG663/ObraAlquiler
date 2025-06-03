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

        $this->call([
            ProvinceSeeder::class,
            MachineTypeSeeder::class,
            MachineSeeder::class,
            ProjectSeeder::class,
            AssignmentSeeder::class,
            MaintenanceSeeder::class,
        ]);

    }
}
