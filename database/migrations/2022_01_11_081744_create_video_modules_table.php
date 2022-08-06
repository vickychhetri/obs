<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoModulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('video_modules', function (Blueprint $table) {
            $table->id('VideoID');
            $table->bigInteger('ChapterID')->unsigned();
            $table->string('videoTitle');
            $table->string('videoDescription');
            $table->string('videoLink');
            $table->string('thumbnail')->dafault('videoThumb.png');
            $table->timestamps();
        });
        Schema::table('video_modules', function($table) {
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
        Schema::dropIfExists('video_modules');
    }
}
