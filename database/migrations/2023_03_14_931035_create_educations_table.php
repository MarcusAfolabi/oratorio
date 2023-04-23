<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {
        Schema::create('educations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->on('users')->reference('id')->onDelete('cascade');
            $table->string('school_name');
            $table->string('country');
            $table->string('city');
            $table->string('degree');
            $table->foreignId('field_id')->on('fields')->reference('id')->onDelete('cascade');
            $table->string('start_date');
            $table->string('end_date');
            $table->string('status');
            $table->timestamps();
        });
    }

    
    public function down(): void
    {
        Schema::dropIfExists('educations');
    }
};
