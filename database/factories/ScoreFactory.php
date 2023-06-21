<?php

namespace Database\Factories;

use App\Models\Judge;
use App\Models\ParticipantEvent;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'participant_event_id' => ParticipantEvent::all()->random()->id,
            'judge_id' => Judge::all()->random()->id,
            'score' => fake()->numberBetween(1, 100)
        ];
    }
}
