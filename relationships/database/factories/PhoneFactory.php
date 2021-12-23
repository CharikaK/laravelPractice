<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

class PhoneFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'=> $this->faker->randomElement(['samsung', 'nokia', 'iPhone', 'pixel', 'crazy']),
            'user_id'=>\App\Models\User::factory()->create()->id // Relationship maintenance
        ];
    }
}
