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
        Schema::create('master_sources', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 50)->nullable(false)->comment('Название источника');
            $table->string('code', 20)->nullable(false)->comment('Код источника');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('master_sources');
    }
};
