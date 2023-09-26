<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(), 
            'mobile' => fake()->phoneNumber(), 
            'department_id' => fake()->randomDigitNotZero(1,20), 
            'user_id' => fake()->randomDigitNotZero(1,20), 
            'status' => fake()->randomElement(['waiting','active','done']), 
            'education' => fake()->word(3), 
            'experince_years' => fake()->randomFloat(), 
            'consultancy_charge' => fake()->randomFloat(),
        ];
    }
}
