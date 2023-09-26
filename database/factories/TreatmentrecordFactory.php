<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Treatmentrecord>
 */
class TreatmentrecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'treatment_id' => fake()->randomDigitNotZero(1,20), 
            'appointment_id' => fake()->randomDigitNotZero(1,20), 
            'patient_id' => fake()->randomDigitNotZero(1,20), 
            'doctor_id' => fake()->randomDigitNotZero(1,20), 
            'descrption' => fake()->sentence(2), 
            'status' => fake()->randomElement(['waiting','active','done']), 
            'treaatmentdate' => fake()->date(), 
            'treaatmenttime' => fake()->time()
        ];
    }
}
