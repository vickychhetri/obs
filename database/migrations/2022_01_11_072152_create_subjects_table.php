<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subjects', function (Blueprint $table) {
            $table->id('SubjectID');
            $table->bigInteger('CourseID')->unsigned();;
            $table->string('subjectName');
            $table->string('subjectDescription');
            $table->string('thumbnail')->dafault('subjectThumb.png');
            $table->timestamps();
        });
        Schema::table('subjects', function($table) {
            $table->foreign('CourseID')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subjects');
    }
}
