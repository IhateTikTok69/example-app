<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\admin;
use App\Models\categories;
use App\Models\cities;
use App\Models\countries;
use App\Models\product;
use App\Models\rooms;
use App\Models\sub_categories;
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
        categories::factory(10)->create();
        sub_categories::factory(10)->create();
        countries::factory(20)->create();
        cities::factory(60)->create();
        product::factory(100)->create();
        users::factory(20)->create();
        transactions::factory(500)->create();
        admin::create([
            'name' => fake()->name(),
            'username' => 'user',
            'password' => bcrypt("pas123"),
            'path' => 'rick.webp',
        ]);
    }
}
