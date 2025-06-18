<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('professionals', function (Blueprint $table) {
            $table->string('service_area')->nullable()->change();
            $table->decimal('hourly_rate', 8, 2)->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('professionals', function (Blueprint $table) {
            $table->string('service_area')->nullable(false)->change();
            $table->decimal('hourly_rate', 8, 2)->nullable(false)->change();
        });
    }
};
