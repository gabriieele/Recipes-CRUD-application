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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('recipe_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null')
            ->onUpdate('set null');
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null')
            ->onUpdate('set null');
            $table->text('content');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
