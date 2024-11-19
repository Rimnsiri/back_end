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
        Schema::create('dev_skills', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dev_id')->constrained()->on('devs')->onDelete('cascade');
            $table->foreignId('skill_id')->constrained()->onDelete('cascade');
            $table->integer('nbrmonth')->default(0);
            $table->boolean('isprincipal');
            $table->boolean('isontop')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dev_skills');
    }
};
