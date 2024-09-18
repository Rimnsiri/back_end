<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFichierPdfToAcceptedTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('accepted_tests', function (Blueprint $table) {
            $table->string('fichier_pdf')->nullable(); // Vous pouvez ajuster le type de données selon vos besoins
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('accepted_tests', function (Blueprint $table) {
            $table->dropColumn('fichier_pdf');
        });
    }
}

