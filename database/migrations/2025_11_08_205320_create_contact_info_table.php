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
        Schema::create('contact_info', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('tips_email')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->string('facebook_url')->nullable();
            $table->string('twitter_url')->nullable();
            $table->string('whatsapp_url')->nullable();
            $table->string('office_hours')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact_info');
    }
};
