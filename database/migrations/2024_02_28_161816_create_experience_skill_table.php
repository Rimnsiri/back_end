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
        Schema::create('experience_skill', function (Blueprint $table) {
            $table->unsignedBigInteger('exp_id');
            $table->unsignedBigInteger('skill_id');
            $table->foreign('exp_id')->references('id')->on('experiences')->onDelete('cascade'); 
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->primary(['exp_id', 'skill_id']); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_skill');
    }
};
