<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Cart::factory()
            ->count(15)
            ->has(\App\Models\CartItem::factory()->count(fake()->numberBetween(1, 4)), 'items')
            ->create();
    }
}
