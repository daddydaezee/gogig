<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
{
    \App\Models\User::factory()->count(10)->create();
    \App\Models\Sponsor::factory()->count(10)->create();
    // Add factories for events, etc., as needed.
}

}
