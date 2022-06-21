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
        Role::create([
            ['guard_name' => 'admin', 'name' => 'Administrator'],
            ['guard_name' => 'user', 'name' => 'User'],
        ]);
        Permission::create([
            ['guard_name' => 'admin', 'name' => 'Create Post'],
            ['guard_name' => 'admin', 'name' => 'Create Comment'],
        ]);
        Permission::create([
            ['guard_name' => 'user', 'name' => 'Create Comment'],
        ]);
    }
}
