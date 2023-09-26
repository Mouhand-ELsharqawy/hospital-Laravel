<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Room>
 */
class RoomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => fake()->word(), 
            'number' => fake()->randomFloat(), 
            'noofbeds' => fake()->randomFloat(), 
            'room_tariff' => fake()->randomFloat(), 
            'status'  => fake()->randomElement(['waiting','active','done'])
        ];
    }
}
