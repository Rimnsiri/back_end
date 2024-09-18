<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('dev_id');
            $table->foreign('dev_id')->references('id')->on('devs')->onDelete('cascade');
            $table->string('title');
            $table->string('description')->nullable();
            $table->integer('tjm');
            $table->string('niveau');
            $table->string('french_level')->nullable();
            $table->string('english_level')->nullable();
            $table->tinyInteger('ispublic')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
