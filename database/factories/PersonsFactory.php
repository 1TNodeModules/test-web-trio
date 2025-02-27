<?php

namespace Database\Factories;

use App\Models\Persons;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Persons>
 */
class PersonsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'lastname' => fake()->name(),
            'firstname' => fake()->firstName(),
            'birth_date' =>  now()->subYears(rand(18, 60)),
        ];
    }
}
