<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'address_id' => \App\Models\Address::inRandomOrder()->first()->id ?? \App\Models\Address::factory(),
            'total_price' => fake()->randomFloat(2, 10, 10000),
            'payment_status' => fake()->randomElement(['pending','paid','failed','refunded','partial_refund']),
        ];
    }
}
