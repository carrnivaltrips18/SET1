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
        Schema::create('hotel_rooms', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('location_wise');
            $table->unsignedBigInteger('hotel_id'); 
            $table->string('category_wise');
            $table->string('hotel_name');
            $table->string('name');
            $table->string('capacity');
            $table->string('bed');
            $table->enum('ac_type', ['AC', 'Non-AC'])->default('Non-AC');
            $table->string('amenities');
            $table->string('price');
            $table->string('pick_season_price');
            $table->string('off_season_price');
            $table->enum('status', ['Available', 'Booked', 'Inactive'])->default('Available'); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            // Foreign key constraint
            $table->foreign('hotel_id')->references('id')->on('hotels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_rooms');
    }
};
