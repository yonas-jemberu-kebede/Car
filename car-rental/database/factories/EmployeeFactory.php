<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_id' => \App\Models\Location::factory(), // Generates a related Location record
            'first_name' => $this->faker->firstName(), // Example: John
            'last_name' => $this->faker->lastName(), // Example: Doe
            'email' => $this->faker->unique()->safeEmail(), // Example: john.doe@example.com
            'phone_number' => $this->faker->phoneNumber(), // Example: +1234567890
            'role' => $this->faker->randomElement(['Admin', 'Staff', 'Mechanic', 'Manager']), // Randomly selects a role
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
