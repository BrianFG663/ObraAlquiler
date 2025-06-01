<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        User::where('email', 'briangonzaz305@gmail.com')->delete();

        return [
        'name' => "brian",
        'lastname' => 'gonzalez',
        'email' => 'briangonzaz305@gmail.com',
        'password' => Hash::make('brian'),
    ];
    }
}
