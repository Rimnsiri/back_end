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
            $table->string('name');
            $table->string('firstname');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('address');
            $table->integer('tjm');
            $table->string('niveau');
            $table->string('french_level')->nullable();
            $table->string('english_level')->nullable();
            $table->string('photo')->nullable();
            $table->tinyInteger('ispublic')->default(1);
            $table->unsignedBigInteger('dev_id');
            $table->foreign('dev_id')->references('id')->on('devs')->onDelete('cascade');
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
