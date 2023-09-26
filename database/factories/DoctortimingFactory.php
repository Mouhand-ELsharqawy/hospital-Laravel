<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctortiming>
 */
class DoctortimingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'doctor_id' => fake()->randomDigitNotZero(1,20), 
            'start' => fake()->time(), 
            'end' => fake()->time(), 
            'avilable_day' => fake()->date(), 
            'status' => fake()->randomElement(['waiting','active','done']),
        ];
    }
}
