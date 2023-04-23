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
        Schema::create('experiences', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->on('users')->reference('id')->onDelete('cascade');
            $table->string('title');
            $table->string('company_name');
            $table->string('employment_type');
            $table->string('start_date');
            $table->string('end_date');
           
            $table->string('work_description');
            $table->string('current_work');
            $table->string('part_time_work');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experiences');
    }
};
