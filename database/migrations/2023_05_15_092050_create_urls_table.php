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
        Schema::create('urls', function (Blueprint $table) {
            $table->id();
            $table->string('url')->unique()->comment('URL');
            $table->bigInteger('entity_id')->comment('Идентификатор сущности');
            $table->string('entity_class')->comment('Класс сущности');

            $table->unsignedInteger('master_id')->nullable(true)->comment('Мастер');
            $table->foreign('master_id')->references('id')->on('masters');

            $table->timestamps();

            $table->index('url');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('urls');
    }
};
