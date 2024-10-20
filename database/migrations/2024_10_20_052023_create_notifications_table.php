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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id('notification_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // ID của người dùng nhận thông báo
            $table->enum('type', ['like', 'comment', 'friend_request', 'message', 'follow', 'other'])->notNull(); // Loại thông báo
            $table->unsignedBigInteger('reference_id')->nullable(); // ID của bài đăng, comment, hoặc người dùng tùy vào loại thông báo
            $table->boolean('seen')->default(false); // Thông báo đã được xem hay chưa
            $table->timestamp('created_at')->useCurrent(); // Thời gian tạo thông báo

            // Thiết lập khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Xóa thông báo nếu người dùng bị xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
