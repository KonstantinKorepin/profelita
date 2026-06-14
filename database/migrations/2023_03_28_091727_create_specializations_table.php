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
        Schema::create('specializations', function (Blueprint $table) {
            $table->smallIncrements('id');
            $table->string('name', 50)->nullable(false)->comment('Название сервиса');
            $table->string('catalog_name', 50)->nullable(false)->comment('Название специализации в каталоге');
            $table->string('catalog_caption_list', 50)->nullable(false)->comment('Заголовок списка услуг');
            $table->string('code', 30)->nullable(false)->comment('Название сервиса в каталоге');
            $table->boolean('active')->nullable(false)->comment('Активность')->default(false);
            $table->unsignedSmallInteger('sort')->nullable(false)->comment('Сортировка');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('specializations');
    }
};
