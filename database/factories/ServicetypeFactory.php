<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Servicetype>
 */
class ServicetypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' =>fake()->word(), 
            'charge' =>fake()->randomFloat(), 
            'description' =>fake()->sentence(2), 
            'status' => fake()->randomElement(['waiting','active','done'])
        ];
    }
}
