<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\customer;
class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 15; $i++) {
            $table = new customer();
            $table->customer_name = $faker->name;
            $table->email = $faker->unique()->safeEmail;
            $table->password = Hash::make('password123');
            $table->phone = $faker->phoneNumber;
            $table->gender = $faker->randomElement(['Male', 'Female', 'Other']);
            $table->hobby = $faker->randomElement(['Shopping', 'Reading', 'Traveling', 'Gaming']);
            $table->image = 'customer-' . ($i + 1) . '.jpg';
            $table->status = 'Unblock';
            $table->created_at = now();
            $table->updated_at = now();
            $table->save();
        }
    }
}
