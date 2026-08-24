<?php

namespace Database\Factories;

use App\Models\Restaurant;
use Illuminate\Database\Eloquent\Factories\Factory;

/** @extends Factory<\App\Models\MenuItem> */
class MenuItemFactory extends Factory
{
    public function definition(): array
    {
        return [
            'restaurant_id' => Restaurant::factory(),
            'name' => fake()->words(3, true),
            'category' => fake()->randomElement(['Main Course', 'Desserts']),
            'price' => fake()->randomFloat(2, 5, 35),
            'is_available' => true,
        ];
    }
}
