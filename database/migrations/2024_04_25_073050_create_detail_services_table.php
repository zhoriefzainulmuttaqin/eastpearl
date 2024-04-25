<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_services', function (Blueprint $table) {
            $table->id();
            $table->string('meeting_point');
            $table->string('meeting_point_en');
            $table->string('meeting_point_mandarin');
            $table->date('month');
            $table->string('pyhscal_activity');
            $table->string('pyhscal_activity_en');
            $table->string('pyhscal_activity_mandarin');
            $table->string('day_trip');
            $table->string('day_trip_en');
            $table->string('day_trip_mandarin');
            $table->integer('minimum_participant');
            $table->longText('long_desc');
            $table->longText('long_desc_en');
            $table->longText('long_desc_mandarin');
            $table->foreignId('services_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_services');
    }
};
