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
        Schema::create('messages', function (Blueprint $table) {
            $table->id('message_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('sender_id'); // ID của người gửi
            $table->unsignedBigInteger('receiver_id'); // ID của người nhận
            $table->text('content'); // Nội dung của tin nhắn
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo tin nhắn, mặc định là CURRENT_TIMESTAMP

            // Thiết lập khóa ngoại
            $table->foreign('sender_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->foreign('receiver_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('messages');
    }
};
