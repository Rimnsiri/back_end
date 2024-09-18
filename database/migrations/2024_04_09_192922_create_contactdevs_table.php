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
        Schema::create('contactdevs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('dev_id');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->text('message'); 
            $table->foreign('dev_id')->references('id')->on('devs')->onDelete('cascade');
            $table->text('response')->nullable();  
            $table->timestamp('response_time')->nullable(); 
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->timestamps();
            $table->unique('email');
        });
    }
    /**a
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contactdevs', function (Blueprint $table) {
            if (Schema::hasColumn('contactdevs', 'response')) {
                $table->dropColumn('response');
            }
            if (Schema::hasColumn('contactdevs', 'response_time')) {
                $table->dropColumn('response_time');
            }
        });
        Schema::dropIfExists('contactdevs');
    }
    
};
