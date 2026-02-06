<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create specific users with roles and carts
        $users = [
            [
                'name' => 'Admin User',
                'email' => 'admin@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'admin'
            ],
            [
                'name' => 'Moderator User',
                'email' => 'moderator@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'moderator'
            ],
            [
                'name' => 'Seller One',
                'email' => 'seller1@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'seller'
            ],
            [
                'name' => 'Seller Two',
                'email' => 'seller2@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'seller'
            ],
            [
                'name' => 'Client One',
                'email' => 'client1@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'client'
            ],
            [
                'name' => 'Client Two',
                'email' => 'client2@vortex.ma',
                'password' => bcrypt('password'),
                'role' => 'client'
            ],
        ];

        foreach ($users as $userData) {
            $user = \App\Models\User::create([
                'name' => $userData['name'],
                'email' => $userData['email'],
                'password' => $userData['password'],
                'email_verified_at' => now(),
                'remember_token' => \Illuminate\Support\Str::random(10),
            ]);
            
            \App\Models\Cart::create(['user_id' => $user->id]);
            $user->assignRole($userData['role']);
        }

        // Create random users with specific role distribution
        $roleDistribution = [
            'client' => 15,
            'seller' => 8,
            'moderator' => 4,
            'admin' => 2,
        ];

        foreach ($roleDistribution as $role => $count) {
            for ($i = 0; $i < $count; $i++) {
                $user = \App\Models\User::factory()->create();
                \App\Models\Cart::create(['user_id' => $user->id]);
                $user->assignRole($role);
            }
        }
    }
}
