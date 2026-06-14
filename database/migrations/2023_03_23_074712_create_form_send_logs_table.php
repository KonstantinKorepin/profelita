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
        Schema::create('form_send_logs', function (Blueprint $table) {
            $table->id();
            $table->string('code', 50)->comment('Код формы');
            $table->jsonb('message')->comment('Содержимое формы');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('form_send_logs');
    }
};
