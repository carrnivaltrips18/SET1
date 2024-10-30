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
        Schema::create('sightseeings', function (Blueprint $table) {
            $table->id();
            $table->string('destination');
            $table->string('location');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP '));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
        $date = [
            'destination' => 'MeghaLaya',
            'location' => 'Guwahati',
        ];
        DB::table('sightseeings')->insert($date);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sightseeings');
    }
};
