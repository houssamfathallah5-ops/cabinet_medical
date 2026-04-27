<?php

namespace Database\Factories;

use App\Models\Service;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Service>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['General Consultation', 'Cardiology', 'Dermatology', 'Pediatrics', 'Radiology', 'Physiotherapy']),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2, 20, 150),
            'duration' => fake()->randomElement([15, 30, 45, 60]),
        ];
    }
}
