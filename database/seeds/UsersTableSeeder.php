<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            'name' => 'John Doe',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin'),
            'role_id' => 1,
        ]);

        User::insert([
            'name' => 'Mary Jean',
            'email' => 'client@example.com',
            'password' => Hash::make('client'),
            'role_id' => 2,
        ]);
    }
}
