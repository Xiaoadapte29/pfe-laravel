<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ModifyYearsExperienceNullableOnProfessionalsTable extends Migration
{
    public function up()
    {
        Schema::table('professionals', function (Blueprint $table) {
            // Rendre nullable
            $table->integer('years_experience')->nullable()->change();

            // OU avec valeur par défaut 0 (décommenter la ligne ci-dessous à la place)
            // $table->integer('years_experience')->default(0)->change();
        });
    }

    public function down()
    {
        Schema::table('professionals', function (Blueprint $table) {
            // Revenir à non nullable sans défaut
            $table->integer('years_experience')->nullable(false)->default(null)->change();
        });
    }
}
