<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescriptionrecord>
 */
class PrescriptionrecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [ 
            'medicine_id' => fake()->randomDigitNotZero(1,20),
            'prescription_id' => fake()->randomDigitNotZero(1,15), 
            'cost' => fake()->randomFloat(),
            'unit' => fake()->randomFloat(), 
            'dosage' => fake()->word(), 
            'status' => fake()->randomElement(['waiting','active','done'])
        ];
    }
}
