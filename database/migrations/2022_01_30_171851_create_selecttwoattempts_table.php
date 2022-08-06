<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelecttwoattemptsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selecttwoattempts', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('QuestionIDModule')->unsigned();
            $table->string('SelectAnswer',5);
            $table->string('QuestionfromtwoTYPE',5);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('selecttwoattempts', function($table) { 
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
        Schema::dropIfExists('selecttwoattempts');
    }
}
