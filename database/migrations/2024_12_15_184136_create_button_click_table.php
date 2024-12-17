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
        Schema::create('button_click', function (Blueprint $table) {
            $table->id();
            $table->string('button_id')->unique(); // ID button, misalnya "whatsapp", "wechat"
            $table->string('button_name');        // Nama button untuk deskripsi, misalnya "WhatsApp", "WeChat"
            $table->integer('click_count')->default(0); // Jumlah klik
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('button_click');
    }
};