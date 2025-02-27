<?php

namespace Database\Factories;

use App\Models\Jobs;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Jobs>
 */
class JobsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'persons_id' => $this->faker->numberBetween(1,10),
            'companies_id' => $this->faker->numberBetween(1,10),
            'start_date' => now()->subYears(rand(1, 10)),
            'end_date' => now()->addYears(rand(1, 5)),
        ];
    }
}
