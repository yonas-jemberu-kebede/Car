<?php

namespace Database\Factories;

use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'location_id' => Location::factory(),
            'make' => fake()->company(), // Represents car manufacturer
            'model' => fake()->randomElement(['Model S', 'Civic', 'Corolla', 'Mustang', 'X5']),
            'year' => (int) date('Y'),
            'color' => fake()->safeColorName(),
            'license_plate' => fake()->unique()->bothify('???-####'),
            'status' => fake()->randomElement(['Available', 'Rented', 'Maintenance']),
            'rental_price_per_day' => fake()->randomFloat(2, 50, 500), // Price between $50.00 and $500.00
            'fuel_type' => fake()->randomElement(['Petrol', 'Diesel', 'Electric']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
