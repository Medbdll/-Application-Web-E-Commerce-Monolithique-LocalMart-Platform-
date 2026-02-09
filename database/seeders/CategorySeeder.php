<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
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

        foreach ($categories as $category) {
            \App\Models\Category::create([
                'name' => $category,
                'slug' => \Str::slug($category),
            ]);
        }
    }
}
