<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products = [
            ['name' => 'RTX 4090 Gaming Desktop', 'base_price' => 2999.99, 'category' => 'Gaming Desktops'],
            ['name' => 'Intel Core i9 Gaming PC', 'base_price' => 2499.99, 'category' => 'Gaming Desktops'],
            ['name' => 'AMD Ryzen 9 Battle Station', 'base_price' => 2299.99, 'category' => 'Gaming Desktops'],
            ['name' => 'ASUS ROG Strix Laptop', 'base_price' => 1899.99, 'category' => 'Gaming Laptops'],
            ['name' => 'MSI Gaming Laptop', 'base_price' => 1699.99, 'category' => 'Gaming Laptops'],
            ['name' => 'Razer Blade Pro', 'base_price' => 2499.99, 'category' => 'Gaming Laptops'],
            ['name' => 'Mechanical RGB Keyboard', 'base_price' => 149.99, 'category' => 'Mechanical Keyboards'],
            ['name' => 'Gaming Mechanical Keyboard', 'base_price' => 89.99, 'category' => 'Mechanical Keyboards'],
            ['name' => 'Wireless Gaming Keyboard', 'base_price' => 129.99, 'category' => 'Mechanical Keyboards'],
            ['name' => 'Gaming Mouse RGB', 'base_price' => 79.99, 'category' => 'Gaming Mice'],
            ['name' => 'Wireless Gaming Mouse', 'base_price' => 99.99, 'category' => 'Gaming Mice'],
            ['name' => 'Professional Gaming Mouse', 'base_price' => 119.99, 'category' => 'Gaming Mice'],
            ['name' => 'Ergonomic Gaming Chair', 'base_price' => 399.99, 'category' => 'Gaming Chairs'],
            ['name' => 'Racing Style Gaming Chair', 'base_price' => 449.99, 'category' => 'Gaming Chairs'],
            ['name' => 'Premium Gaming Chair', 'base_price' => 599.99, 'category' => 'Gaming Chairs'],
            ['name' => '7.1 Gaming Headset', 'base_price' => 129.99, 'category' => 'Headsets & Audio'],
            ['name' => 'Wireless Gaming Headset', 'base_price' => 159.99, 'category' => 'Headsets & Audio'],
            ['name' => 'Professional Gaming Headset', 'base_price' => 199.99, 'category' => 'Headsets & Audio'],
            ['name' => '4K Gaming Monitor', 'base_price' => 799.99, 'category' => 'Monitors'],
            ['name' => '144Hz Gaming Monitor', 'base_price' => 449.99, 'category' => 'Monitors'],
            ['name' => 'Ultra-wide Gaming Monitor', 'base_price' => 899.99, 'category' => 'Monitors'],
        ];

        $product = fake()->randomElement($products);
        $category = \App\Models\Category::where('name', $product['category'])->first();
        
        return [
            'name' => $product['name'] . ' ' . fake()->randomElement(['Pro', 'Elite', 'Ultra', 'Max', 'Plus', 'X']),
            'description' => fake()->paragraph(3) . ' Features: ' . fake()->sentence(2) . '. Perfect for gaming enthusiasts and professionals.',
            'image' => 'products/' . fake()->numberBetween(1, 20) . '.jpg',
            'price' => $product['base_price'] + fake()->randomFloat(2, -50, 200),
            'stock' => fake()->numberBetween(5, 100),
            'status' => fake()->randomElement(['active', 'active', 'active', 'inactive']),
            'user_id' => \App\Models\User::factory(),
            'category_id' => $category ? $category->id : \App\Models\Category::factory(),
        ];
    }
}
