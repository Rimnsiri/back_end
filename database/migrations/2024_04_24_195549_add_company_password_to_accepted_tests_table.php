<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyPasswordToAcceptedTestsTable extends Migration
{
    public function up()
    {
        Schema::table('accepted_tests', function (Blueprint $table) {
            $table->string('company_password')->nullable();
        });
    }

    public function down()
    {
        Schema::table('accepted_tests', function (Blueprint $table) {
            $table->dropColumn('company_password');
        });
    }
}

