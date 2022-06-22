<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@email.com',
            'password' => Hash::make('admin'),
        ]);
        DB::table('users')->insert([
            'name' => 'editor',
            'email' => 'editor@email.com',
            'password' => Hash::make('editor'),
        ]);
        DB::table('users')->insert([
            'name' => 'user',
            'email' => 'user@email.com',
            'password' => Hash::make('user'),
        ]);
        User::factory()->count(100)->create();
    }
}
