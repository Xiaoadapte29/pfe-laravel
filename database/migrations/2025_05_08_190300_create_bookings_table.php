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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
    $table->enum('status', ['pending', 'accepted', 'completed', 'cancelled'])->default('pending');
    $table->timestamp('scheduled_at');
    $table->timestamp('scheduled_end_time')->nullable();
    $table->text('notes')->nullable();
    $table->text('cancellation_reason')->nullable();
    $table->foreignId('client_id')->constrained('users')->onDelete('cascade');
    $table->foreignId('service_id')->constrained('services')->onDelete('cascade');
    $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
