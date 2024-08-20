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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Tiêu đề
            $table->string('slug')->unique(); // Đường dẫn thân thiện với SEO
            $table->text('short_description'); // Mô tả ngắn
            $table->text('long_description'); // Mô tả dài
            $table->string('images')->nullable(); // Hình ảnh (đường dẫn đến hình ảnh)
            $table->timestamps(); // Thời gian tạo và cập nhật
        });
   
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
