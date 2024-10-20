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
        Schema::create('group_messages', function (Blueprint $table) {
            $table->id('message_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('group_id'); // ID của nhóm chat
            $table->unsignedBigInteger('sender_id'); // ID của người gửi tin nhắn
            $table->text('content'); // Nội dung tin nhắn
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo tin nhắn

            // Thiết lập khóa ngoại
            $table->foreign('group_id')->references('group_id')->on('group_chats')->onDelete('cascade');
            $table->foreign('sender_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_messages');
    }
};
