<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserfeedbackusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userfeedbackusers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('ItemID')->unsigned();
            $table->enum('Answer', ['Strongly Agree', 'Agree','Uncertain','Disagree','Strongly disagree']);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('userfeedbackusers', function($table) { 
            $table->foreign('UserID')->references('UserID')->on('loginusers');
            $table->foreign('ItemID')->references('ItemID')->on('userfeedbacks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('userfeedbackusers');
    }
}
