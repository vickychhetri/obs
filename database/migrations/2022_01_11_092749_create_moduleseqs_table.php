<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModuleseqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moduleseqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('CatID')->unsigned();
            $table->string('title');
            $table->string('description');
            $table->bigInteger('ContentID')->unsigned();
            $table->integer('visible')->default('1');
            $table->timestamps();
        });
        Schema::table('moduleseqs', function($table) {
            $table->foreign('CatID')->references('CatID')->on('categoryseqs');
          
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('moduleseqs');
    }
}
