<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAttempttestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attempttests', function (Blueprint $table) {
            $table->id('AttemptQID');
            $table->bigInteger('TestID')->unsigned();
            $table->bigInteger('QuestionID')->unsigned();
            $table->string('selectedAnswer');
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('attempttests', function($table) {
            $table->foreign('TestID')->references('TestID')->on('test_modules');
            $table->foreign('QuestionID')->references('QuestionID')->on('questionbanks');
            $table->foreign('UserID')->references('UserID')->on('loginusers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('attempttests');
    }
}
