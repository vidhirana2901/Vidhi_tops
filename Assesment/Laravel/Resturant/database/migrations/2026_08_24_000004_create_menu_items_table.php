<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('menu_items')) {
            Schema::create('menu_items', function (Blueprint $table) {
                $table->id();
                $table->foreignId('restaurant_id')->nullable()->constrained()->cascadeOnDelete();
                $table->string('name');
                $table->string('category');
                $table->decimal('price', 8, 2);
                $table->boolean('is_available')->default(true);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('food_items') && DB::table('menu_items')->count() === 0) {
            $restaurantId = DB::table('restaurants')->value('id');
            $foodItems = DB::table('food_items')->get();

            foreach ($foodItems as $foodItem) {
                DB::table('menu_items')->insert([
                    'restaurant_id' => $restaurantId,
                    'name' => $foodItem->name,
                    'category' => $foodItem->category,
                    'price' => $foodItem->price,
                    'is_available' => $foodItem->is_available,
                    'created_at' => $foodItem->created_at,
                    'updated_at' => $foodItem->updated_at,
                ]);
            }
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('menu_items');
    }
};
