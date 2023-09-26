<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
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
            'doctor_id' => fake()->randomDigitNotZero(1,20), 
            'orderdate' =>fake()->date(), 
            'deliverydate' =>fake()->date(), 
            'address' => fake()->streetAddress(), 
            'phone' => fake()->phoneNumber(), 
            'note' =>fake()->sentence(3), 
            'status' => fake()->randomElement(['waiting','active','done']), 
            'paymenttype' => fake()->word(), 
            'cardno' => fake()->numerify(12), 
            'cvvno' => fake()->numerify(4), 
            'card_holder' => fake()->name(), 
            'expiredate' => fake()->date()
        ];
    }
}
