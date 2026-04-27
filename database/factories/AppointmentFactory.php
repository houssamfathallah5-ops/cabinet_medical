<?php

namespace Database\Factories;

use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Appointment>
 */
class AppointmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'patient_id' => \App\Models\User::factory(),
            'doctor_id' => \App\Models\User::factory()->state(['role' => 'doctor']),
            'service_id' => \App\Models\Service::factory(),
            'appointment_date' => fake()->dateTimeBetween('now', '+1 month'),
            'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
            'notes' => fake()->optional()->sentence(),
        ];
    }
}
