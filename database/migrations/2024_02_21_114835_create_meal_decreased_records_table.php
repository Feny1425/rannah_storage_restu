<?php

use App\Enums\CloseTypeEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('meal_decreased_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained('records')->cascadeOnDelete();
            $table->enum('type', array_column(CloseTypeEnum::cases(), 'value'));
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meal_decreased_records');
    }
};
