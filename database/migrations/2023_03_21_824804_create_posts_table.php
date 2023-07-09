<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->on('users')->reference('id')->onDelete('cascade');
            $table->string('category_id');
            $table->string('title')->nullable();
            $table->text('content');
            $table->string('slug');
            $table->integer('views')->default('0');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
