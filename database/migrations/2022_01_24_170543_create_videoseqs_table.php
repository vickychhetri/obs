<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideoseqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videoseqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('VideoID')->unsigned();
            $table->bigInteger('Sequence')->unsigned();
            $table->timestamps();
        });
        Schema::table('videoseqs', function($table) { 
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
        Schema::dropIfExists('videoseqs');
    }
}
