<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Booking>
 */
class BookingFactory extends Factory
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
            'customer_id' => \App\Models\Customer::factory(), // Generates a related Customer record
            'location_id' => \App\Models\Location::factory(), // Generates a related Location record
            'start_date' => $this->faker->dateTimeBetween('now', '+1 month'), // Example: Start date within the next month
            'end_date' => $this->faker->dateTimeBetween('+1 month', '+2 months'), // Example: End date after start date
            'pickup_location' => $this->faker->streetAddress(), // Example: 123 Main St
            'dropoff_location' => $this->faker->streetAddress(), // Example: 456 Elm St
            'total_price' => $this->faker->randomFloat(2, 100, 1000), // Example: Price between $100 and $1000
            'payment_status' => $this->faker->randomElement(['Pending', 'Paid']), // Randomly selects 'Pending' or 'Paid'
            'status' => $this->faker->randomElement(['Confirmed', 'Completed', 'Canceled']), // Randomly selects status
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
