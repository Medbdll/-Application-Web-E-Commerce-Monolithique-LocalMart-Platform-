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

        // create permissions
        Permission::create(['name' => 'show products']);
        Permission::create(['name' => 'show orders']);
        Permission::create(['name' => 'show my products']);
        Permission::create(['name' => 'show my orders']);
        Permission::create(['name' => 'show review']);
        Permission::create(['name' => 'show users']);

        Permission::create(['name' => 'edit status review']);
        Permission::create(['name' => 'edit status order']);
        Permission::create(['name' => 'edit status product']);
        Permission::create(['name' => 'edit product']);
        Permission::create(['name' => 'edit user role']);

        Permission::create(['name' => 'create product']);
        Permission::create(['name' => 'create user']);

        Permission::create(['name' => 'delete product']);
        Permission::create(['name' => 'suspend product']);
        Permission::create(['name' => 'suspend user']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'client']);

        $role2 = Role::create(['name' => 'moderator']);
        $role2->givePermissionTo('show review');
        $role2->givePermissionTo('edit status review');
        $role2->givePermissionTo('suspend product');
        $role2->givePermissionTo('suspend user');

        $role3 = Role::create(['name' => 'seller']);
        $role3->givePermissionTo('show my products');
        $role3->givePermissionTo('show my orders');
        $role3->givePermissionTo('create product');
        $role3->givePermissionTo('edit product');
        $role3->givePermissionTo('edit status product');
        $role3->givePermissionTo('edit status order');
        $role3->givePermissionTo('delete product');

        $role4 = Role::create(['name' => 'admin']);


        $user = \App\Models\User::factory()->create([
            'name' => 'client',
            'email' => 'client@example.com',
        ]);
        $user->assignRole($role1);

        $user = \App\Models\User::factory()->create([
            'name' => 'moderator',
            'email' => 'moderator@example.com',
        ]);
        $user->assignRole($role2);

        $user = \App\Models\User::factory()->create([
            'name' => 'seller',
            'email' => 'seller@example.com',
        ]);
        $user->assignRole($role3);
        $user = \App\Models\User::factory()->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);
        $user->assignRole($role4);
    }
}
