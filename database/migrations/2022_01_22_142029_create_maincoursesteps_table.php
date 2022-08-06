<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaincoursestepsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maincoursesteps', function (Blueprint $table) {
            $table->id();
            $table->string('Step',2);
            $table->string('Complete',2);
            $table->bigInteger('ChapterID')->unsigned();
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('maincoursesteps', function($table) {
            $table->foreign('ChapterID')->references('ChapterID')->on('chapters');
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
        Schema::dropIfExists('maincoursesteps');
    }
}
