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
        Schema::create('ferries', function (Blueprint $table) {
            $table->id();
            $table->string('ferry_type');
            $table->string('destination');
            $table->string('pickup_location_wise');
            $table->string('pickup_sightseeing_point');
            $table->string('drop_location_wise');
            $table->string('drop_sightseeing_point');
            $table->decimal('price'); 
            $table->decimal('pick_session_price');
            $table->decimal('off_session_price'); 
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        $data = [
            'ferry_type' => 'Makruzz',
            'destination' => 'MeghaLaya',
            'pickup_location_wise' => 'Guwahati',
            'pickup_sightseeing_point' => 'VISIT GUWAHATI WAR MEMORIAL',
            'drop_location_wise' => 'Peacock Island',
            'drop_sightseeing_point' => 'located on the Peacock Island',
            'price' =>  1000.00,
            'pick_session_price' => 1500.00,
            'off_session_price' => 750.00,
        ];
        DB::table('ferries')->insert($data);;
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ferries');
    }
};
