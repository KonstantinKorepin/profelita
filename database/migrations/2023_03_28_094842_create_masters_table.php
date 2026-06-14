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
        Schema::create('masters', function (Blueprint $table) {
            $table->integerIncrements('id');

            $table->unsignedInteger('city_id')->nullable(false)->comment('Город');
            $table->foreign('city_id')->references('id')->on('cities');

            $table->unsignedSmallInteger('specialization_id')->nullable(false)->comment('Специализация');
            $table->foreign('specialization_id')->references('id')->on('specializations');

            $table->unsignedSmallInteger('master_sources_id')->nullable(false)->comment('Специализация');
            $table->foreign('master_sources_id')->references('id')->on('master_sources');

            $table->unsignedBigInteger('profile_file_id')->nullable(true)->comment('Аватарка профиля');
            $table->foreign('profile_file_id')->references('id')->on('files');

            $table->unsignedBigInteger('list_file_id')->nullable(true)->comment('Аватарка в списке');
            $table->foreign('list_file_id')->references('id')->on('files');

            $table->string('last_name', 50)->nullable(false)->comment('Фамилия');
            $table->string('first_name', 50)->nullable(false)->comment('Имя');
            $table->string('middle_name', 50)->comment('Отчество')->nullable();
            $table->string('phone', 18)->comment('Телефон');
            $table->float('rating')->comment('Средняя оценка');

            $table->string('start_working_hours', 5)->comment('Время начала рабочего дня');
            $table->string('end_working_hours', 5)->comment('Время окончания рабочего дня');
            $table->float('warranty_period')->comment('Срок гарантии на работы');

            $table->unsignedSmallInteger('professional_activity_year')->comment('Год начала профессиональной деятельности');
            $table->unsignedSmallInteger('count_realized_orders')->comment('Количество реализованных заказов в сервисе');

            $table->text('education')->comment('Образование');
            $table->text('description')->comment('Описание');

            $table->string('url_source')->comment('Ссылка на источник');
            $table->boolean('on_front')->comment('Вывод на странице со списком мастеров');
            $table->boolean('actual')->comment('Актуальны ли данные по мастеру')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
