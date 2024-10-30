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
        Schema::create('hotel_categories', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('location_wise');
            $table->string('category_wise');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        $data = [
            'destination' => 'Andaman',
            'location_wise' => 'Andaman',
            'category_wise' => 'Super Dulax'
        ];
        DB::table('hotel_categories')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotel_categories');
    }
};
