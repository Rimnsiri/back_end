<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDeveloperInfoToEnregistestTable extends Migration
{
    public function up()
    {
        Schema::table('enregistests', function (Blueprint $table) {
            $table->unsignedBigInteger('developer_id')->nullable();
            $table->foreign('developer_id')->references('id')->on('comptedevs')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('enregistests', function (Blueprint $table) {
            $table->dropForeign(['developer_id']);
            $table->dropColumn('developer_id');
        });
    }
}

