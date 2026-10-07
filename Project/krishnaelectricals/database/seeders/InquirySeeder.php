<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\inquiry;

class InquirySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 10; $i++) 
            {
                $table=new inquiry();
                $table->client_name = $faker->name;
                $table->contact = $faker->phoneNumber;
                $table->requirements = $faker->paragraph;
                $table->status = $faker->randomElement(['Pending Quote', 'Stock Available', 'Out of Stock']);
                $table->created_at = now();
                $table->updated_at = now();
                $table->save();
           }
    }
}
