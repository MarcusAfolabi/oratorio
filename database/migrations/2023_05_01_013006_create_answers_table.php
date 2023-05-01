<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('quiz_id')->on('quizzes')->reference('id')->onDelete('cascade');
            $table->foreignId('participant_id')->on('participants')->reference('id')->onDelete('cascade');
            $table->string('response');
            $table->timestamps();
        });
    }

     
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
