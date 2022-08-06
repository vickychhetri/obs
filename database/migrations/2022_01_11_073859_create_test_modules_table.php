<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_modules', function (Blueprint $table) {
            $table->id('TestID');
            $table->bigInteger('ChapterID')->unsigned();;
            $table->string('testName');
            $table->string('testDescription');
            $table->string('thumbnail')->dafault('testThumb.png');
            $table->timestamps();
        });
        Schema::table('test_modules', function($table) {
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
        Schema::dropIfExists('test_modules');
    }
}
