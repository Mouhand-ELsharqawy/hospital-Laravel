<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'admissiondate' => fake()->date(), 
            'admissiontime' => fake()->time(), 
            'address' => fake()->streetAddress(), 
            'mobile' => fake()->phoneNumber(), 
            'city' => fake()->city(), 
            'pincode' => fake()->countryCode(), 
            'bloodgroup' => fake()->bloodGroup(), 
            'gender' => fake()->randomElement(['male','female']), 
            'dob' => fake()->date(), 
            'status' => fake()->randomElement(['waiting','active','done'])
        ];
    }
}
