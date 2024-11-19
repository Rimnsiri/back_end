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
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dev_id');
            $table->string('diplome');
            $table->string('école');
            $table->date('startdate');
            $table->date('enddate')->nullable();
            $table->boolean('is_current')->default(false);
            $table->text('description')->nullable();
            $table->foreign('dev_id')->references('id')->on('devs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('education');
    }
};
