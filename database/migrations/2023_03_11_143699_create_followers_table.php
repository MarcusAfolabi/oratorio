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
        Schema::create('followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('followee_id');
            $table->unique(['user_id', 'followee_id']);

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); // the person you follow
            $table->foreign('followee_id')->references('id')->on('users')->onDelete('cascade'); // ther person that follow you
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followers');
    }
};
