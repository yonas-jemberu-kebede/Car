<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'booking_id' => \App\Models\Booking::factory(), // Generates a related Booking record
            'amount' => $this->faker->randomFloat(2, 50, 5000), // Random amount between $50 and $5000
            'tax' => $this->faker->randomFloat(2, 5, 500), // Random tax between $5 and $500
            'total_amount' => function (array $attributes) {
                return $attributes['amount'] + $attributes['tax']; // Total amount is the sum of amount and tax
            },
            'payment_status' => $this->faker->randomElement(['Pending', 'Paid', 'Failed']), // Randomly selects the payment status
            'invoice_date' => $this->faker->dateTimeThisYear(), // Example: Invoice date within the current year
            'due_date' => $this->faker->dateTimeBetween('now', '+30 days'), // Example: Due date within the next 30 days
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
