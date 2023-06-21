<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Event>
 */
class EventFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $date = Carbon::parse(fake()->date());
        $startDate = $date->toDateString();
        $endDate = $date->addDays(random_int(1, 14))->toDateString();

        return [
            'name' => fake()->word(),
            'start_date' => $startDate,
            'end_date' => $endDate,
        ];
    }
}
