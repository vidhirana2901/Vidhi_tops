<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MenuItem;
use App\Models\Restaurant;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $restaurants = Restaurant::factory(3)->create();
        MenuItem::factory(5)->create(['restaurant_id' => $restaurants->random()->id, 'category' => 'Main Course']);
        MenuItem::factory(5)->create(['restaurant_id' => $restaurants->random()->id, 'category' => 'Desserts']);

        User::updateOrCreate(['email' => 'admin@example.com'], [
            'name' => 'Admin User', 'role' => 'admin', 'password' => Hash::make('password'),
        ]);
        User::updateOrCreate(['email' => 'customer@example.com'], [
            'name' => 'Customer User', 'role' => 'customer', 'password' => Hash::make('password'),
        ]);
    }
}
