<?php
// database/migrations/xxxx_xx_xx_xxxxxx_add_test_id_to_enregistests_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTestIdToEnregistestsTable extends Migration
{
    public function up()
    {
        Schema::table('enregistests', function (Blueprint $table) {
            $table->unsignedBigInteger('test_id')->nullable()->after('developer_id');
            $table->foreign('test_id')->references('id')->on('accepted_tests')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('enregistests', function (Blueprint $table) {
            $table->dropForeign(['test_id']);
            $table->dropColumn('test_id');
        });
    }
}

