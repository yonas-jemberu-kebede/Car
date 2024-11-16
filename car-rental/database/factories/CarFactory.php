<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
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
            'location_id'=>Location::factory(),
            'make' =>fake()->company(),
            'model'=> fake()->car(),
            'year'=>(int)date('Y'),
            'color'=>fake()->color(),
            'license_plate' => fake()->unique()->bothify('???-####'),
            'status' => $this->faker->randomElement(['Available', 'Rented', 'Maintenance']),
            'rental_price_per_day' => $this->faker->randomFloat(2, 50, 500), // Price between $50.00 and $500.00
            'fuel_type' => $this->faker->randomElement(['Petrol', 'Diesel', 'Electric']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
