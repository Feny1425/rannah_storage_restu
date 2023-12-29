<?php

use App\Http\SqlHelper;
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
            $table->string("name_en");
            $table->string("unit");
            $table->string("unit_en");
            $table->enum("type", ["food", "supplies"]);
            $table->string('name_unit')->virtualAs(SqlHelper::getConcatSql(['name', 'unit']));
            $table->string('name_unit_en')->virtualAs(SqlHelper::getConcatSql(['name_en', 'unit_en']));
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
