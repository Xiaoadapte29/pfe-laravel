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
        Schema::create('professionals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('specialty'); 
            $table->text('bio')->nullable();
            $table->string('years_experience');
            $table->string('service_area'); 
            $table->decimal('hourly_rate', 8, 2);
            $table->decimal('rating', 2, 1)->default(0);
            $table->integer('review_count')->default(0);
            $table->json('availability')->nullable(); 
            $table->json('certifications')->nullable();
            $table->string('insurance_provider')->nullable();
            $table->string('policy_number')->nullable();
            $table->string('profile_photo_path')->nullable();
            $table->timestamps();
            
            $table->index('specialty');
            $table->index('rating');
            $table->index('service_area');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('professionals');
    }
};
