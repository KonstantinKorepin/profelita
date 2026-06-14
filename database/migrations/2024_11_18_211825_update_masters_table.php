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
        Schema::table('masters', function (Blueprint $table) {
            $table->string('address', 255)->nullable()->comment('Адрес');
            $table->string('map', 512)->nullable()->comment('Карта');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('masters', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('map');
        });
    }
};
