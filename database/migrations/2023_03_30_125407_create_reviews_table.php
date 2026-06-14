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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('master_id')->nullable(false)->comment('Мастер');
            $table->foreign('master_id')->references('id')->on('masters');

            $table->unsignedSmallInteger('rating')->nullable(false)->comment('Рейтинг');
            $table->string('name')->nullable(false)->comment('Имя оставившего отзыв');
            $table->text('review')->nullable('false')->comment('Текст отзыва');
            $table->date('date')->nullable(false)->comment('Дата отзыва');
            $table->boolean('on_front')->nullable(false)->comment('Выводить на главной странице "Отзывы"');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
