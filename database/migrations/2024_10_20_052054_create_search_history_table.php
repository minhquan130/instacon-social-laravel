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
        Schema::create('search_history', function (Blueprint $table) {
            $table->id('search_id'); // PRIMARY KEY AUTO_INCREMENT
            $table->unsignedBigInteger('user_id'); // ID của người dùng thực hiện tìm kiếm
            $table->string('search_query', 255); // Nội dung tìm kiếm
            $table->timestamp('searched_at')->useCurrent(); // Thời gian tìm kiếm

            // Thiết lập khóa ngoại
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade'); // Xóa lịch sử tìm kiếm nếu người dùng bị xóa
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('search_history');
    }
};
