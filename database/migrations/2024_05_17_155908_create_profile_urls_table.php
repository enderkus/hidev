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
        Schema::create('profile_urls', function (Blueprint $table) {
            $table->id();
            $table->string('personal_webpage')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('x_profile')->nullable();
            $table->foreignId('profile_id')->constrained('user_profiles')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profile_urls');
    }
};
