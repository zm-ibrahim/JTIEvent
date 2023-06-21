<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => fake()->unique()->numberBetween(1, User::count()),
            'full_name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'birth_date' => fake()->date(),
            'school_name' => fake()->words(rand(1, 3), true)
        ];
    }
}
