<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 
    public function up(): void
    {
        Schema::create('volunteers', function (Blueprint $table) {
            $table->id();
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('location');
            $table->string('born_again');
            $table->string('department');
            $table->string('attendance'); 
            $table->timestamps();
        });
    }
 
    public function down(): void
    {
        Schema::dropIfExists('volunteers');
    }
};
