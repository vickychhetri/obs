<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockunlocksimpletestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockunlocksimpletests', function (Blueprint $table) {
            $table->id();
            $table->string('TYPE',5); 
            $table->string('UnLock',5);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('lockunlocksimpletests', function($table) { 
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
        Schema::dropIfExists('lockunlocksimpletests');
    }
}
