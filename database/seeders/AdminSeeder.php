<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::find(1);
        $admin->assignRole('admin');
        $admin->givePermissionTo('admin');

        $editor = User::find(2);
        $editor->assignRole('editor');
        $editor->givePermissionTo('editor');

        $user = User::find(3);
        $user->assignRole('user');
        $user->givePermissionTo('user');
    }
}
