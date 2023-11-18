<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        if (Role::count() > 0) {
            return;
        }

        $role = Role::create(['name' => 'admin']);
        $permission1 = Permission::create(['name' => 'can create users']);
        $permission2 = Permission::create(['name' => 'can view users']);
        $permission3 = Permission::create(['name' => 'can create products']);
        $permission4 = Permission::create(['name' => 'can update products']);
        $permission5 = Permission::create(['name' => 'can delete products']);
        $permission6 = Permission::create(['name' => 'can view products']);
        $role->syncPermissions([$permission1, $permission2, $permission3, $permission4, $permission5, $permission6]);

        $role = Role::create(['name' => 'user']);
        $permission7 = Permission::create(['name' => 'can chat with admin']);
        $role->syncPermissions([$permission6, $permission7]);
        
        $role = Role::create(['name' => 'sale']);
        $permission8 = Permission::create(['name' => 'can create tasks']);
        $permission9 = Permission::create(['name' => 'can create repairs']);
        $role->syncPermissions([$permission8, $permission9]);
        
        $role = Role::create(['name' => 'technician']);
        $permission10 = Permission::create(['name' => 'can update tasks']);
        $role->syncPermissions([$permission10]);
        
        $role = Role::create(['name' => 'manager']);
        $permission11 = Permission::create(['name' => 'can manage work technician']);
        $role->syncPermissions([$permission11]);



    }
}
