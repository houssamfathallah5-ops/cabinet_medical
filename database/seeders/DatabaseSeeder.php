<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        
        User::factory()->create([
            'name' => 'Admin Cabinet',
            'email' => 'admin@cabinet.com',
            'password' => \Illuminate\Support\Facades\Hash::make('password'),
            'role' => 'admin',
        ]);

        $doctors = User::factory(2)->create([
            'role' => 'doctor',
        ]);

        $patients = User::factory(8)->create([
            'role' => 'patient',
        ]);

        $services = \App\Models\Service::factory(5)->create();

        foreach (range(1, 20) as $index) {
            \App\Models\Appointment::create([
                'patient_id' => $patients->random()->id,
                'doctor_id' => $doctors->random()->id,
                'service_id' => $services->random()->id,
                'appointment_date' => fake()->dateTimeBetween('now', '+1 month'),
                'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled']),
                'notes' => fake()->optional()->sentence(),
            ]);
        }
    }
}
