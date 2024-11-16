<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company(), // Example: Company name as the location name
            'address' => $this->faker->address(), // Example: Random address (e.g., 123 Main St, City, Country)
            'contact_number' => $this->faker->phoneNumber(), // Example: Random phone number (e.g., +1234567890)
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
