<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use App\Models\supplier;
class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 0; $i < 5; $i++) {
            $table = new \App\Models\supplier();
            $table->supplier_name = $faker->company;
            $table->contact_person = $faker->name;
            $table->phone = $faker->phoneNumber;
            $table->gstin = $faker->optional()->bothify('??#########?');
            $table->created_at = now();
            $table->updated_at = now();
            $table->save();
        }
    }
}
