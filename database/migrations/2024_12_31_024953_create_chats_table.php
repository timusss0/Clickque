<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('chats', function (Blueprint $table) {
            $table->id(); // Primary key untuk tabel chats
            $table->unsignedBigInteger('user_id'); // Referensi ke user yang login
            $table->string('selected_mbti'); // MBTI yang dipilih
            $table->unsignedBigInteger('partner_id'); // Referensi ke partner chat
            $table->timestamps();
    
            // Relasi ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('partner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chats');
    }
};
