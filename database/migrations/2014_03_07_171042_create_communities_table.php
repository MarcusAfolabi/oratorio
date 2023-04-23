<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
     
    public function up(): void
    {
        Schema::create('communities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('acronyms');
            $table->string('location');
            $table->string('phone');
            $table->string('logo')->nullable();
            $table->integer('views')->default('0');
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('communities');
    }
};
