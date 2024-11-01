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
        Schema::create('packages', function (Blueprint $table) {
            $table->id();
            $table->string('package_name');
            $table->integer('day'); // Changed to integer
            $table->integer('night'); // Changed to integer
            $table->string('package_img');
            $table->string('package_status');
            // Section 1
            $table->string('s1_text1')->nullable();
            $table->string('s1_anim_text2')->nullable();
            $table->string('s1_text3')->nullable();
            $table->string('s1_btn1')->nullable();
            $table->string('s1_btn2')->nullable();
            $table->string('s1_img')->nullable();
            $table->string('s1_square_box_text')->nullable(); // Fixed spelling
            // Section 2
            $table->string('s2_text1')->nullable();
            $table->string('s2_anim_text2')->nullable();
            $table->string('s2_text3')->nullable();
            $table->string('s2_btn1')->nullable();
            $table->string('s2_btn2')->nullable();
            $table->string('s2_img')->nullable();
            $table->string('s2_square_box_text')->nullable(); // Fixed spelling
            // Section 3
            $table->string('s3_text1')->nullable();
            $table->string('s3_anim_text2')->nullable();
            $table->string('s3_text3')->nullable();
            $table->string('s3_btn1')->nullable();
            $table->string('s3_btn2')->nullable();
            $table->string('s3_img')->nullable();
            $table->string('s3_square_box_text')->nullable(); // Fixed spelling
            // Timestamps
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('packages');
    }
};
