<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\admin;
use App\Models\rooms;
use App\Models\transactions;
use App\Models\users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    protected $password;
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        users::factory(100)->create();
        rooms::factory(100)->create();
        transactions::factory(500)->create();
        admin::create([
            'name' => fake()->name(),
            'username' => 'johncock',
            'password' => bcrypt("pas123"),
            'path' => 'rick.webp',
        ]);
    }
}
