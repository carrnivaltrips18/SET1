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
        Schema::create('sightseeing_imgs', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('location_wise');
            $table->unsignedBigInteger('sightseeing_id');
            $table->string('name');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            // Add foreign key constraint
            $table->foreign('sightseeing_id')->references('id')->on('sightseeings')->onDelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sightseeing_imgs');
    }
};
