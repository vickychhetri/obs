<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestcompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testcompletes', function (Blueprint $table) {
            $table->id();
            $table->enum('TypeCategory', ['PRE','POST']);
            $table->bigInteger('TestID')->unsigned();
            $table->string('Complete',2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('testcompletes');
    }
}
