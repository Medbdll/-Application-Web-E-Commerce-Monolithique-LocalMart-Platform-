<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Services\GamingImageService;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = [
            'Gaming Desktops',
            'Gaming Laptops',
            'Mechanical Keyboards',
            'Gaming Mice',
            'Gaming Chairs',
            'Headsets & Audio',
            'Monitors',
            'Graphics Cards',
            'Processors',
            'Gaming Consoles',
            'Controllers',
            'Gaming Accessories',
            'VR Equipment',
            'Gaming Desks',
            'Lighting',
        ];

        $name = fake()->unique()->randomElement($categories);
        $gamingImageService = new GamingImageService();

        return [
            'name' => $name,
            'slug' => \Str::slug($name),
            'image' => $gamingImageService->getCategoryImage($name),
        ];
    }
}
