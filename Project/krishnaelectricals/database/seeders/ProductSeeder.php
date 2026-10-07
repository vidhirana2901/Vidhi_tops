<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\product;
class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $categoryIds = DB::table('categories')->pluck('id')->toArray();

        if (empty($categoryIds)) {
            return;
        }

        for ($i = 0; $i < 10; $i++) {
            $table=new product();
            $table->product_name = $faker->words(3, true);
            $table->category_id = $faker->randomElement($categoryIds);
            $table->price = $faker->randomFloat(2, 50, 2000);
            $table->stock_quantity = $faker->numberBetween(5, 200);
            $table->created_at = now();
            $table->updated_at = now();
            $table->save();
        }
    }
}
