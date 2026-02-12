<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Order::factory()
            ->count(5)
            ->has(\App\Models\OrderItem::factory()->count(fake()->numberBetween(1, 5)), 'items')
            ->create();
    }
}
