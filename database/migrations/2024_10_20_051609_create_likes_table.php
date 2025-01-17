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
        Schema::create('likes', function (Blueprint $table) {
            $table->id('like_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // INT không dấu cho user_id
            $table->unsignedBigInteger('post_id'); // INT không dấu cho post_id
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP mặc định là CURRENT_TIMESTAMP

            // Thiết lập khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('post_id')->references('post_id')->on('posts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likes');
    }
};
