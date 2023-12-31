<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('meal_id')->constrained("meals")->cascadeOnDelete();
            $table->foreignId('item_id')->constrained("items")->cascadeOnDelete();
            $table->unique(['meal_id', 'item_id']);
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_items');
    }
};
