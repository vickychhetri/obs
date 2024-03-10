<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterMoreOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('moreoptions', function (Blueprint $table) {
            $table->string('option1');
            $table->string('option2');
            $table->string('option3');
            $table->string('option4');

            // Add two integer columns
            $table->integer('answer');
            $table->integer('option_length');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('moreoptions', function (Blueprint $table) {
            $table->dropColumn('option1');
            $table->dropColumn('option2');
            $table->dropColumn('option3');
            $table->dropColumn('option4');

            $table->dropColumn('answer');
            $table->dropColumn('option_length');

        });
    }
}
