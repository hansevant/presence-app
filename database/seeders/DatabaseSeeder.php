<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $user = [
            'assistant_id' => 'A001',
            'name' => 'Admin',
            'role' => 'Admin',
            'username' => 'admin1',
            'password' => bcrypt('admin'),
        ];

        // Insert data into users table
        User::create($user);
    }
}
