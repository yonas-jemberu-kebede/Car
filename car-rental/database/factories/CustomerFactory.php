<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Location;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
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
            'first_name' => $this->faker->firstName(), // Example: John
            'last_name' => $this->faker->lastName(), // Example: Doe
            'email' => $this->faker->unique()->safeEmail(), // Example: john.doe@example.com
            'phone_number' => $this->faker->phoneNumber(), // Example: +1234567890
            'address' => $this->faker->address(), // Example: 123 Main St, Springfield
            'driver_license_number' => $this->faker->unique()->regexify('[A-Z0-9]{8}'), // Example: AB123456
            'profile_picture' => $this->faker->optional()->imageUrl(200, 200, 'people', true, 'Profile Picture'), // Example: URL for profile picture
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
