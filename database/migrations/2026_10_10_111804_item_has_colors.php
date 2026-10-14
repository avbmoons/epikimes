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
        Schema::create('item_has_colors', function (Blueprint $table) {
            $table->foreignId('item_id')->references('id')->on('items')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignId('color_id')->references('id')->on('colors')->cascadeOnDelete()->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('item_has_colors');
    }
};
