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
        Schema::create('moons', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('planet_id')->constrained('celestial_bodies'); // planet_id là foreign key liên kết với bảng celestial_bodies
            $table->double('mass')->nullable();
            $table->double('radius')->nullable();
            $table->double('orbital_period')->nullable(); // in days
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('moons');
    }
};
