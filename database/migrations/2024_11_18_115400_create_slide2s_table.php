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
        Schema::create('slide2s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('package_id');
            $table->string('Experience_Description')->nullable();
            $table->string('Experience_Media_Link')->nullable();
            $table->string('Point_1_Heading')->nullable();
            $table->string('Point_1_Details')->nullable();
            $table->string('Point_2_Heading')->nullable();
            $table->string('Point_2_Details')->nullable();
            $table->string('Point_3_Heading')->nullable();
            $table->string('Point_3_Details')->nullable();
            $table->string('Point_4_Heading')->nullable();
            $table->string('Point_4_Details')->nullable();
            $table->string('Point_5_Heading')->nullable();
            $table->string('Point_5_Details')->nullable();
            $table->string('Point_6_Heading')->nullable();
            $table->string('Point_6_Details')->nullable();

            // Foreign key to link slide2s to packages table
            $table->foreign('package_id')->references('id')->on('packages')->onDelete('cascade');

            // Laravel's default timestamps method will create created_at and updated_at columns automatically
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP')); // This will create created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slide2s');
    }
};
