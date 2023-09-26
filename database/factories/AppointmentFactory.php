<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class AppointmentFactory extends Factory
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
            'patient_id' => fake()->randomDigitNotZero(1,20),
            'room_id' => fake()->randomDigitNotZero(1,20), 
            'department_id' => fake()->randomDigitNotZero(1,20), 
            'appointmentdate' => fake()->date(), 
            'appointmenttime' => fake()->time(), 
            'doctor_id' => fake()->randomDigitNotZero(1,20), 
            'status' => fake()->randomElement(['waiting','active','done']), 
            'app_reason' => fake()->sentence(2),
        ];
    }
}
