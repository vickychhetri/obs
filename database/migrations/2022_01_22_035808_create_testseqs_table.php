<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestseqsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testseqs', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('TestID')->unsigned();
            $table->bigInteger('Sequence')->unsigned();
            $table->timestamps();
        });
        Schema::table('testseqs', function($table) {
            $table->foreign('TestID')->references('TestID')->on('test_modules');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testseqs');
    }
}
