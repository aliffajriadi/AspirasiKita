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
        Schema::create('file_reports', function (Blueprint $table) {
            $table->id();
            $table->string('original_name');
            $table->string('stored_name')->nullable();
            $table->foreignId('report_id')->constrained(
                table: 'reports',
                column: 'id'
            );
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_reports');
    }
};
