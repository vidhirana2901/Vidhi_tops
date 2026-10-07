<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        $categories = [
            'Electrical Components',
            'Switches & Sockets',
            'Lighting Solutions',
            'Tools & Accessories',
            'Wiring & Cables',
        ];

        foreach ($categories as $categoryName) {
             $table=new category();
             $table->category_name = $categoryName;
             $table->image = 'category-' . strtolower(str_replace(' ', '-', $categoryName)) . '.jpg';
             $table->description = $faker->sentence(12);
             $table->created_at = now();
             $table->updated_at = now();
             $table->save();
        }
    }
}
