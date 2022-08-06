<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChaptersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapters', function (Blueprint $table) {
            $table->id('ChapterID');
            $table->bigInteger('SubjectID')->unsigned();;
            $table->string('chapterName');
            $table->string('chapterDescription');
            $table->string('thumbnail')->dafault('chapterThumb.png');
            $table->timestamps();
        });
        Schema::table('chapters', function($table) {
            $table->foreign('SubjectID')->references('SubjectID')->on('subjects');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chapters');
    }
}
