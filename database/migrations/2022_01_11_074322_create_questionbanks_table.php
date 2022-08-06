<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionbanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionbanks', function (Blueprint $table) {
            $table->id('QuestionID');
            $table->bigInteger('TestID')->unsigned();;
            $table->string('question');
            $table->string('optionA');
            $table->string('optionB');
            $table->string('optionC');
            $table->string('optionD');
            $table->string('correctAnswer');
            $table->string('diagram')->dafault('diagramQuestion.png');
            $table->timestamps();
        });
        Schema::table('questionbanks', function($table) {
            $table->foreign('TestID')->references('TestID')->on('test_modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionbanks');
    }
}
