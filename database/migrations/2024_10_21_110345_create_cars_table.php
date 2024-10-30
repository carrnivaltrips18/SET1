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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('car_type');
            $table->string('destination');
            $table->string('pickup_location_wise');
            $table->string('pickup_sightseen_point');
            $table->string('drop_location_wise');
            $table->string('drop_sightseen_point');
            $table->string('price');
            $table->string('pick_session_price');
            $table->string('off_session_price');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        $data = [
            'car_type' => 'Mahindra Scorpio',
            'destination' => 'MeghaLaya',
            'pickup_location_wise' => 'Guwahati',
            'pickup_sightseen_point' => 'VISIT GUWAHATI WAR MEMORIAL',
            'drop_location_wise' => 'Peacock Island',
            'drop_sightseen_point' => 'The Umananda temple, located on the Peacock Island',
            'price' =>  '1000',
            'pick_session_price' => '1500',
            'off_session_price' => '750',
        ];
        DB::table('cars')->insert($data);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
