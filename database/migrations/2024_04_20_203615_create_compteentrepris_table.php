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
        Schema::create('compteentrepris', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('domaine');
            $table->string('email');
            $table->string('password');
            $table->string('confirmepassword');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compteentrepris');
    }
};
