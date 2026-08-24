<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('playlists', function (Blueprint $table) {
            // Adds string column 'cover_image' after 'description' that can be null
            $table->string('cover_image')->nullable()->after('description');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('playlists', function (Blueprint $table) {
            // Drops the column if migration is rolled back
            $table->dropColumn('cover_image');
        });
    }
};
?>