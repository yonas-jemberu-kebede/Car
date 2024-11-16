<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarMaintainance>
 */
class CarMaintainanceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'car_id' => \App\Models\Car::factory(), // Generates a related Car record
            'employee_id' => \App\Models\Employee::factory(), // Generates a related Employee record
            'maintainance_date' => $this->faker->dateTimeBetween('-1 year', 'now'), // Example: Maintenance date within the last year
            'description' => $this->faker->sentence(15), // Example: A detailed maintenance description
            'cost' => $this->faker->randomFloat(2, 50, 5000), // Example: Cost between $50 and $5000
            'status' => $this->faker->randomElement(['Pending', 'Completed']), // Randomly selects the status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
