<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockunlockvideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockunlockvideos', function (Blueprint $table) {
            $table->id();
            $table->string('ContentType',2);
            $table->bigInteger('VideoID')->unsigned();
            $table->string('unLock',2);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('lockunlockvideos', function($table) {
            $table->foreign('UserID')->references('UserID')->on('loginusers');
            $table->foreign('VideoID')->references('VideoID')->on('video_modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lockunlockvideos');
    }
}
