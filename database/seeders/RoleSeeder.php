<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin 1', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Admin 2', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Author 1', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);
        Role::create(['name' => 'Author 2', 'guard_name' => 'author', 'created_at' => now(), 'updated_at' => now()]);

        //PERMISSIONS - ADMIN AUTH
        Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Index-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Edit-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Index-Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Edit-Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Delete-Permission', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Index-Country', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);
        Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin', 'created_at' => now(), 'updated_at' => now()]);

    
    }
}
