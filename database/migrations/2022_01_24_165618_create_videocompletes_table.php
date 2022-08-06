<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideocompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videocompletes', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('VideoID')->unsigned();
            $table->string('Complete',2);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('videocompletes', function($table) {
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
        Schema::dropIfExists('videocompletes');
    }
}
