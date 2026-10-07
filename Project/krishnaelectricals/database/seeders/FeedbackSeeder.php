<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\feedback;
class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 8; $i++) {
            $table=new feedback();
            $table->name= $faker->name;
            $table->rating= $faker->randomFloat(1, 1, 5);
            $table->feedback_note= $faker->sentence(15);
            $table->created_at= now();
            $table->updated_at= now();
            $table->save();
        }
    }
}
