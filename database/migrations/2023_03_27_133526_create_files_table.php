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
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->comment('Название');
            $table->string('file_name')->comment('Название файла');
            $table->string('mime_type')->nullable()->comment('Тип файла');
            $table->string('path')->comment('Путь до файла');
            $table->unsignedBigInteger('size')->comment('Размер файла');
            $table->string('directory')->comment('Директория');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
