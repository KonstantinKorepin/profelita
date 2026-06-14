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
        Schema::create('cities', function (Blueprint $table) {
            $table->integerIncrements('id');
            $table->string('name', 50)->nullable(false)->comment('Название города');
            $table->string('code', 20)->nullable(false)->comment('Код');
            $table->string('prepositional', 50)->nullable(false)->comment('Предложный падеж');
            $table->string('genitive', 50)->nullable(false)->comment('Родительный падеж');
            $table->string('dative', 50)->nullable(false)->comment('Дательный падеж');
            $table->boolean('active')->nullable(false)->comment('Активность')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
