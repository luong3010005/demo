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
        Schema::create('celestial_bodies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->enum('type', ['Hành tinh', 'Sao', 'Vệ tinh']);
            $table->double('mass')->nullable();
            $table->double('radius')->nullable();
            $table->double('distance_from_sun')->nullable(); 
            $table->double('orbital_period')->nullable(); 
            $table->year('discovery_year')->nullable();
            $table->string('images')->nullable(); // Add this line for images
            $table->foreignId('category_id')->constrained('categories');
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('celestial_bodies');
    }
};
