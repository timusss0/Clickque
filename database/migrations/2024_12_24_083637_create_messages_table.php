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
            $table->id(); // Primary key
            $table->unsignedBigInteger('user_id'); // Foreign key untuk user
            $table->text('message'); // Isi pesan
            $table->timestamps(); // Created at & Updated at otomatis
        
            // Tambahkan foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
