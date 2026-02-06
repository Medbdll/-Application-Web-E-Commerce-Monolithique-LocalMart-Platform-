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
            'cart_id' => \App\Models\Cart::inRandomOrder()->first()->id ?? \App\Models\Cart::factory(),
            'total_price' => fake()->randomFloat(2, 10, 10000),
            'payment_status' => fake()->randomElement(['pending','paid','failed','refunded','partial_refund']),
            'status' => fake()->randomElement(['pending','confirmed','processing','shipped','delivered','cancelled','returned']),
            'user_id' => \App\Models\User::factory(),
        ];
    }
}
