<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tests', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('compteentrepris_id');  
        $table->foreign('compteentrepris_id')->references('id')->on('compteentrepris')->onDelete('cascade');
        $table->string('nom');
        $table->text('description');
        $table->integer('duree_estimee');
        $table->string('categorie');
        $table->string('niveau');
        $table->binary('fichier_pdf')->nullable(); 
        $table->string('statut')->default('en attente');
        $table->timestamp('date_creation')->useCurrent();
        $table->timestamps();

    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tests');
    }
};
