<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaximumtestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maximumtests', function (Blueprint $table) {
            $table->id();
            $table->string('TotalTest',3);
            $table->bigInteger('ChapterID')->unsigned();
            $table->timestamps();
        });
        Schema::table('maximumtests', function($table) {
            $table->foreign('ChapterID')->references('ChapterID')->on('chapters');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maximumtests');
    }
}
