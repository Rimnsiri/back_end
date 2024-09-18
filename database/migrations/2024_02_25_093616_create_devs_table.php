<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create('devs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('firstname');
            $table->text('presentation');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->string('photo')->nullable();
            $table->unsignedBigInteger('comptedev_id')->nullable();
            $table->foreign('comptedev_id')->references('id')->on('comptedevs')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('devs');
    }
};
