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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string("name");
            $table->string("nameEN");
            $table->string("unit");
            $table->string("unitEN");
            $table->unique(["name", "unit"]);
            $table->enum("type", ["food", "supplies"]);
            // sqlite
            $table->string('name_unit')->virtualAs('name || " " || unit');
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
