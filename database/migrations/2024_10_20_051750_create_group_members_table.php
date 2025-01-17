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
        Schema::create('group_members', function (Blueprint $table) {
            $table->unsignedBigInteger('group_id'); // ID của nhóm chat
            $table->unsignedBigInteger('user_id'); // ID của người dùng trong nhóm
            $table->timestamp('joined_at')->useCurrent(); // Thời gian người dùng tham gia nhóm

            // Thiết lập khóa chính tổng hợp
            $table->primary(['group_id', 'user_id']); // PRIMARY KEY (group_id, user_id)

            // Thiết lập khóa ngoại
            $table->foreign('group_id')->references('group_id')->on('group_chats')->onDelete('cascade');
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('group_members');
    }
};
