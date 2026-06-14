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
        Schema::create('area_cities', function (Blueprint $table) {
            $table->unsignedInteger('city_id');
            $table->unsignedInteger('area_id');
            $table->index('city_id', 'city_idx');
            $table->index('area_id', 'area_idx');
            $table->foreign('city_id', 'city_fk')->on('cities')->references('id');
            $table->foreign('area_id', 'area_fk')->on('areas')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('area_cities');
    }
};
