<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReponseTestsTable extends Migration
{
    public function up()
    {
        Schema::create('reponse_tests', function (Blueprint $table) {
            $table->id();
            $table->text('reponse');
            $table->timestamp('start_time')->nullable();
            $table->timestamp('end_time')->nullable();
            $table->unsignedBigInteger('id_test')->nullable(); 
            $table->unsignedBigInteger('compteentrepris_id');  
            $table->unsignedInteger('note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('reponse_tests');
    }
}