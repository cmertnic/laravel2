<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Запуск миграции.
     */
    public function up(): void
    {
        Schema::dropIfExists('reports');

        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->string('number');
            $table->text('description');
            $table->timestamps();
            // Внешний ключ для статуса
            $table->foreignId('status_id')
                ->nullable()
                ->constrained()
                ->cascadeOnUpdate()
                ->nullOnDelete(); 
            // Внешний ключ для пользователя
            $table->foreignId('user_id') 
                ->nullable()
                ->constrained('users') 
                ->cascadeOnUpdate()
                ->nullOnDelete();

            $table->softDeletes();
        });
    }

    /**
     * Обратная миграция.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
