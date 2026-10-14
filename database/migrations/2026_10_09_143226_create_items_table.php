<?php

use App\Enums\Palette;
use App\Enums\Status;
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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->string('title', 100);
            $table->text('description')->nullable();
            $table->enum('palette', [Palette::all()]);
            $table->string('size', 100)->nullable();
            $table->smallInteger('year')->unsigned();
            $table->string('file_path', 200)->nullable();
            $table->bigInteger('category_id');
            $table->boolean('is_new')->default(false);
            $table->enum('status', [Status::all()]);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
