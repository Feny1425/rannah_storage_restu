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
        Schema::create('import_export_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('record_id')->constrained()->onDelete('cascade');
            $table->foreignId('import_branch_id')->constrained('branches')->onDelete('cascade');
            $table->foreignId('export_branch_id')->constrained('branches')->onDelete('cascade');
            $table->integer('quantity');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->dateTime('status_updated_at')->nullable();
            $table->foreignId('status_updated_by')->nullable()->constrained('users')->onDelete('cascade');
            $table->text('status_updated_reason')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('import_export_records');
    }
};
