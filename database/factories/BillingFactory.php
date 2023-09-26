<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billing>
 */
class BillingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => fake()->randomDigitNotZero(1,20), 
            'appointment_id' => fake()->randomDigitNotZero(1,20), 
            'date' => fake()->date(), 
            'time' => fake()->time(), 
            'dicount' => fake()->randomFloat(), 
            'taxamount' => fake()->randomFloat(), 
            'discountreason' =>fake()->sentence(2), 
            'dischargedate' => fake()->date(), 
            'dischargetime' => fake()->time(),
        ];
    }
}
