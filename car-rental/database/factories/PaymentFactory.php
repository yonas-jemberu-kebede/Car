<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'invoice_id' => \App\Models\Invoice::factory(), // Generates a related Invoice record
            'amount_paid' => $this->faker->randomFloat(2, 10, 5000), // Random amount between $10 and $5000
            'payment_method' => $this->faker->randomElement(['Credit Card', 'Cash', 'Bank Transfer']), // Randomly selects a payment method
            'payment_status' => $this->faker->randomElement(['Completed', 'Pending', 'Failed']), // Randomly selects a payment status
            'payment_date' => $this->faker->dateTimeThisYear(), // Example: Payment date within the current year
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
