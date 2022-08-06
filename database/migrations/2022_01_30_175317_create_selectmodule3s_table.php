<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectmodule3sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selectmodule3s', function (Blueprint $table) {
            $table->id();
            $table->string('TYPE',10)->default("3"); 
            $table->string('Section3',100); 
            $table->bigInteger('Correct')->unsigned();
            $table->timestamps();
        });
        Schema::table('selectmodule3s', function($table) { 
            $table->foreign('Correct')->references('id')->on('moreoptions');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('selectmodule3s');
    }
}
