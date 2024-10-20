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
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // INT không dấu cho user_id
            $table->text('content')->nullable(); // TEXT cho nội dung bài viết, có thể null
            $table->string('media_url', 255)->nullable(); // VARCHAR(255) cho đường dẫn media, có thể null
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP cho thời gian tạo, mặc định là CURRENT_TIMESTAMP

            // Thiết lập khóa ngoại với bảng Users
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
