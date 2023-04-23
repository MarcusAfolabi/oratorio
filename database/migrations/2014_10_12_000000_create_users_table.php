<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('middle_name')->nullable(); 
            $table->string('username')->nullable(); 
            $table->string('slug')->unique();
            $table->string('whatsapp')->nullable();
            $table->string('phone')->nullable(); 
            $table->string('email')->unique();
            $table->string('linkedin_profile')->nullable();
            $table->string('date_of_birth')->nullable();
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('gender')->nullable(); 
            $table->string('work_experience')->nullable();  
            $table->text('biography')->nullable();
            $table->enum('role',['member','influencer','admin'])->default('member');
            $table->foreignId('community_id')->on('communities')->reference('id')->onDelete('cascade')->nullable();
            $table->foreignId('industry_id')->on('industries')->reference('id')->onDelete('cascade')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password')->nullable();
            $table->integer('views')->default('0');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_url', 2048)->nullable();
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
