<?php

namespace Database\Seeders;

use App\Models\Judge;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JudgeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Judge::factory()->count(5)->create();
    }
}
