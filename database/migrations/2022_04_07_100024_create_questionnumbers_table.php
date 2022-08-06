<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionnumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionnumbers', function (Blueprint $table) {
            $table->id();
             $table->bigInteger('QuestionID')->unsigned();
            $table->string('QNo',3);
            $table->timestamps(); 
        });
          Schema::table('questionnumbers', function($table) { 
            $table->foreign('QuestionID')->references('QuestionID')->on('questionbanks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questionnumbers');
    }
}
