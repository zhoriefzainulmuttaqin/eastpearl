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
        Schema::create('services_destinations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('services_id');
            $table->foreignId('destination_id');
            $table->timestamps();

            $table->foreign('services_id')->references('id')->on('services')->onDelete('cascade');
            $table->foreign('destination_id')->references('id')->on('destination')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services_destinations');
    }
};