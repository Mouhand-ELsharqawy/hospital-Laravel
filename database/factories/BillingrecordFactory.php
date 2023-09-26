<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Billingrecord>
 */
class BillingrecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'billing_id' => fake()->randomDigitNotZero(1,20), 
            'servicetype_id' => fake()->randomDigitNotZero(1,20), 
            'amount' => fake()->randomFloat(), 
            'billdate' => fake()->date(), 
            'status' => fake()->randomElement(['waiting','active','done']),
        ];
    }
}
