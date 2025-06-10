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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();

            $table->string('code');
            $table->string('title');
            $table->text('description');
            $table->text('location')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->foreignId('category_id')->constrained(
                'categories',
                'id');
            $table->timestamps();

            $table->string('name')->nullable();
            $table->string('phone_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reports');
    }
};
