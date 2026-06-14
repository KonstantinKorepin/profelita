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
        Schema::create('service_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('specialization_id')->nullable(false)->comment('Специализация');
            $table->foreign('specialization_id')->references('id')->on('specializations');

            $table->unsignedBigInteger('parent_id')->nullable(true)->comment('Родитель');
            $table->foreign('parent_id')->references('id')->on('service_templates');

            $table->string('name')->nullable(false)->comment('Название шаблона услуги');
            $table->string('catalog_name')->nullable(false)->comment('Общее наазвание шаблона услуги в каталоге');
            $table->string('code')->nullable(false)->unique()->comment('Код шаблона услуги');
            $table->string('h1')->nullable(false)->comment('H1 шаблона услуги');
            $table->string('title')->nullable(false)->comment('Title шаблона услуги');
            $table->string('description')->nullable(false)->comment('Description шаблона услуги');
            $table->string('keywords')->nullable(true)->comment('Keywords шаблона услуги');
            $table->string('default_template')->nullable(false)->comment('Шаблон по умолчанию');
            $table->boolean('main_service')->nullable(false)->comment('Главная услуга специализации');
            $table->boolean('on_city_list')->nullable(false)->default(false)->comment('Выводить в списке на странице города');
            $table->boolean('section')->nullable(false)->default(false)->comment('Услуга или секция');
            $table->unsignedSmallInteger('default_price')->nullable(true)->comment('Цена по умолчанию');
            $table->unsignedBigInteger('sort')->nullable(false)->comment('Сортировка');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_templates');
    }
};
