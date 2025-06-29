<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // 10 users, random roles
        User::factory()->count(10)->create();

        // Create a specific admin
        User::factory()->create([
            'username' => 'admin',
            'email' => 'admin@gogig.com',
            'role' => 'admin',
            'password' => bcrypt('password'),
        ]);
    }
}
