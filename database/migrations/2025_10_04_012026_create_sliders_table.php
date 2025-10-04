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
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');            // optional
            $table->text('description')->nullable();       // optional
            $table->text('alt_text')->nullable();       // optional
            $table->string('image')->nullable();           // optional, store image path
            $table->date('start_date')->nullable();        // optional
            $table->date('end_date')->nullable();          // optional
            $table->string('button')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sliders');
    }
};
