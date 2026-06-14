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
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->unsignedInteger('master_id')->nullable(true)->comment('Мастер');
            $table->foreign('master_id')->references('id')->on('masters');

            $table->unsignedBigInteger('organization_id')->nullable(true)->comment('Организация');
            $table->foreign('organization_id')->references('id')->on('organizations');

            $table->unsignedBigInteger('service_templates_id')->nullable(false)->comment('Шаблон услуги');
            $table->foreign('service_templates_id')->references('id')->on('service_templates');

            $table->unsignedBigInteger('parent_id')->nullable(true)->comment('Родитель');
            $table->foreign('parent_id')->references('id')->on('services');

            $table->string('name')->nullable(false)->comment('Кастомное название шаблона услуги');
            $table->string('h1')->nullable(false)->comment('Кастомный H1 шаблона услуги');
            $table->string('title')->nullable(false)->comment('Кастомный Title шаблона услуги');
            $table->string('description')->nullable(false)->comment('Кастомный Description шаблона услуги');
            $table->string('keywords')->nullable(false)->comment('Кастомный Keywords шаблона услуги');
            $table->string('template')->nullable(false)->comment('Кастомный шаблон по умолчанию');
            $table->boolean('main_service')->nullable(false)->comment('Главная услуга специализации');
            $table->boolean('on_city_list')->nullable(false)->default(false)->comment('Выводить в списке на странице города');
            $table->boolean('section')->nullable(false)->default(false)->comment('Услуга или секция');
            $table->unsignedSmallInteger('price')->nullable(true)->comment('Цена по умолчанию');
            $table->unsignedBigInteger('sort')->nullable(false)->comment('Сортировка');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
