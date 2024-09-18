<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdTestAndIdDevpToReponseTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reponse_tests', function (Blueprint $table) {
         
            $table->unsignedBigInteger('id_devp')->nullable(); // Ajout de la colonne id_devp
        
            // Pas de clé étrangère pour id_devp dans cette migration
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reponse_tests', function (Blueprint $table) {
       
            $table->dropColumn('id_devp'); // Suppression de la colonne id_devp lors de la migration inverse
        });
    }
}
