<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Judge>
 */
class JudgeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $judges = User::select('id')->where('role', 'JUDGE')->get();
        return [
            'user_id' => fake()->unique()->randomElement($judges),
            'full_name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
        ];
    }
}
