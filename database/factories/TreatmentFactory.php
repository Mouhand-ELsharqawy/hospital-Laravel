<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatment>
 */
class TreatmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'treatment_type' => fake()->word(), 
            'cost' => fake()->randomFloat(), 
            'notic' => fake()->sentence(2), 
            'status' => fake()->randomElement(['waiting','active','done'])
        ];
    }
}
