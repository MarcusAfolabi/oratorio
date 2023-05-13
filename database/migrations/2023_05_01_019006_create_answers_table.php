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
            $table->text('question');
            $table->string('participant_id');
            $table->text('chosenAnswer');
            $table->timestamps();
        });
    }

     
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};