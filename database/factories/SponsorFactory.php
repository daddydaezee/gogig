<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SponsorFactory extends Factory
{
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'type' => $this->faker->randomElement(['Corporate', 'Media', 'NGO']),
            'email' => $this->faker->companyEmail,
            'phone' => $this->faker->phoneNumber,
            'amount' => $this->faker->numberBetween(1000, 10000)
        ];
    }
}