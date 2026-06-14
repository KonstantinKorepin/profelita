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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false)->comment('Название организации');
            $table->string('full_name')->comment('Полное название организации');
            $table->string('inn')->comment('ИНН');
            $table->string('kpp')->comment('КПП');
            $table->string('ogrn')->comment('ОГРН');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
