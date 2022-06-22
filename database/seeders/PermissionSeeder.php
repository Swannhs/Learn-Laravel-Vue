<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'admin']);
        Permission::create(['name' => 'editor']);
        Permission::create(['name' => 'user']);

        Role::create(['name' => 'admin'])->givePermissionTo('admin');
        Role::create(['name' => 'editor'])->givePermissionTo('editor');
        Role::create(['name' => 'user'])->givePermissionTo('user');
    }
}
