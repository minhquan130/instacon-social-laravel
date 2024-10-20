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
        Schema::create('friends', function (Blueprint $table) {
            $table->unsignedBigInteger('user_id'); // Kiểu dữ liệu INT
            $table->unsignedBigInteger('friend_id'); // Kiểu dữ liệu INT
            $table->enum('status', ['pending', 'accepted', 'blocked'])->default('pending'); // ENUM với giá trị mặc định 'pending'
            $table->timestamp('created_at')->useCurrent(); // TIMESTAMP với giá trị mặc định là CURRENT_TIMESTAMP

            $table->primary(['user_id', 'friend_id']); // PRIMARY KEY (user_id, friend_id)

            // FOREIGN KEY (user_id) REFERENCES users(user_id)
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            // FOREIGN KEY (friend_id) REFERENCES users(user_id)
            $table->foreign('friend_id')->references('user_id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('friends');
    }
};
