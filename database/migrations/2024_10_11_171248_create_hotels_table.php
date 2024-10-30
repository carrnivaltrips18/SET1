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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('location_wise');
            $table->string('category_wise');
            $table->string('name');
            $table->string('no_of_room');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->tinyInteger('status')->default(0)->comment('1: available | 0: not available');
            $table->date('season_start_date');
            $table->date('season_end_date');
            $table->date('pick_season_start_date');
            $table->date('pick_season_end_date');
            $table->date('off_season_start_date');
            $table->date('off_season_end_date');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hotels');
    }
};