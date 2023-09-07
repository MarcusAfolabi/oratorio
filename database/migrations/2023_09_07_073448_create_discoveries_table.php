<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    
    public function up(): void
    {
        Schema::create('discoveries', function (Blueprint $table) {
            $table->id();
            $table->string('fullname');
            $table->string('email');
            $table->string('phone');
            $table->string('school');
            $table->string('presentation');
            $table->string('group');
            $table->timestamps();
        });
    }

   
    public function down(): void
    {
        Schema::dropIfExists('discoveries');
    }
};
