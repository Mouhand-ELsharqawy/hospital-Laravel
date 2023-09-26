<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
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
            'paiddate' => fake()->date(), 
            'paidtime' => fake()->time(), 
            'paidamount' => fake()->randomFloat(), 
            'status' => fake()->randomElement(['waiting','active','done']), 
            'cardholder' => fake()->name(), 
            'cardnumber' => fake()->numerify(12), 
            'cvvno' => fake()->numerify(),
            'exdate' => fake()->date()
        ];
    }
}
