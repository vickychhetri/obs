<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserfeedcompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userfeedcompletes', function (Blueprint $table) {
            $table->id();
            $table->string('Type',3);
            $table->string('Complete',5);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('userfeedcompletes', function($table) { 
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
        Schema::dropIfExists('userfeedcompletes');
    }
}
