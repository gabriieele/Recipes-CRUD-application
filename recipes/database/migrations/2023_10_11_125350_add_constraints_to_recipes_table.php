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
        Schema::table('recipes', function (Blueprint $table) {
            $table->foreignId('user_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null')
            ->onUpdate('set null');

    $table->foreignId('category_id')
            ->nullable()
            ->constrained()
            ->onDelete('set null')
            ->onUpdate('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('recipes', function (Blueprint $table) {
            $table->dropForeign('recipes_user_id_foreign');
            $table->dropColumn('user_id');
            $table->dropForeign('recipes_playlist_id_foreign');
            $table->dropColumn('category_id');
        });
    }
};
