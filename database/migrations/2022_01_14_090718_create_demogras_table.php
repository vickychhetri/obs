<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDemograsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('demogras', function (Blueprint $table) {
            $table->id();
            $table->string('age');
            $table->string('gender');
            $table->string('college');
            $table->string('state');
            $table->string('yearStudy');
            $table->string('alreadyInformation');
            $table->string('alreadyIExplanation');
            $table->bigInteger('UserID')->unsigned()->unique();
            $table->timestamps();
        });
        Schema::table('demogras', function($table) {
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
        Schema::dropIfExists('demogras');
    }
}
