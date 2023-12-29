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
        Schema::create('branch_meals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->foreignId('branch_id')->constrained("branches")->cascadeOnDelete();
            $table->foreignId('meal_id')->constrained("meals")->cascadeOnDelete();
            $table->unique(['branch_id', 'meal_id']);
            $table->integer('quantity')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('branch_meal');
    }
};
