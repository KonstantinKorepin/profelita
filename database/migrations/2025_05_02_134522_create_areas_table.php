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
        Schema::create('areas', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 50)->unique()->nullable(false)->comment('Название района');
            $table->string('code', 50)->unique()->nullable(false)->comment('Код района');
            $table->string('description', 512)->nullable()->comment('Описание района');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('areas');
    }
};
