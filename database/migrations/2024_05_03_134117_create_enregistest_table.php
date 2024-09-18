<?php

// database/migrations/create_enregistest_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnregistestTable extends Migration
{
    public function up()
    {
        Schema::create('enregistests', function (Blueprint $table) {
            $table->id();
            $table->string('developerEmail');
            $table->string('developerPassword');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('enregistests');
    }
}

