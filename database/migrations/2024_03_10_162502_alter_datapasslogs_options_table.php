<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterDatapasslogsOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('datapasslogs', function (Blueprint $table) {
            $table->string('pass_status',30)->nullable();
            $table->string('test_number',30)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('datapasslogs', function (Blueprint $table) {
           $table->dropColumn('pass_status');
            $table->dropColumn('test_number');
        });
    }
}
