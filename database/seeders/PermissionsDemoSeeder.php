<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class PermissionsDemoSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions (only if they don't exist)
        $permissions = [
            'show products',
            'show orders',
            'show my products',
            'show my orders',
            'show review',
            'show users',
            'edit status review',
            'edit status order',
            'edit status product',
            'edit product',
            'edit user role',
            'create product',
            'create user',
            'delete product',
            'suspend product',
            'suspend user',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // create roles and assign existing permissions
        $role1 = Role::firstOrCreate(['name' => 'client']);
        $role1->syncPermissions(['show products', 'show my orders', 'show review']);

        $role2 = Role::firstOrCreate(['name' => 'moderator']);
        $role2->syncPermissions([
            'show review',
            'edit status review',
            'suspend product',
            'suspend user',
            'show products',
            'show orders'
        ]);

        $role3 = Role::firstOrCreate(['name' => 'seller']);
        $role3->syncPermissions([
            'show my products',
            'show my orders',
            'create product',
            'edit product',
            'edit status product',
            'edit status order',
            'delete product',
            'show products'
        ]);

        $role4 = Role::firstOrCreate(['name' => 'admin']);
        $finalPermissions = [
    'show products',
    'show orders', 
    'show my products',
    'show my orders',
    'show review',
    'show users',
    'edit status review',
    'edit status product',
    'edit user role',
    'create product',
    'create user',
    'suspend product',
    'suspend user'
];
        $role4->syncPermissions($finalPermissions);

        // create demo users (only if they don't exist)
        $demoUsers = [
            [
                'name' => 'client',
                'email' => 'client@example.com',
                'role' => $role1
            ],
            [
                'name' => 'moderator',
                'email' => 'moderator@example.com',
                'role' => $role2
            ],
            [
                'name' => 'seller',
                'email' => 'seller@example.com',
                'role' => $role3
            ],
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'role' => $role4
            ],
        ];

        foreach ($demoUsers as $userData) {
            $user = \App\Models\User::firstOrCreate(
                ['email' => $userData['email']],
                [
                    'name' => $userData['name'],
                    'password' => bcrypt('password'),
                    'email_verified_at' => now(),
                ]
            );
            $user->assignRole($userData['role']);
        }
    }
}
