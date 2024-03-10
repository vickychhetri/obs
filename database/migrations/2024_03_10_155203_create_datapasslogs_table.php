<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDatapasslogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datapasslogs', function (Blueprint $table) {
            $table->id();
            $table->string('TYPE',5)->nullable();
            $table->mediumText('data_report')->nullable();
            $table->string('result',100);
            $table->bigInteger('UserID')->unsigned();
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
        Schema::dropIfExists('datapasslogs');
    }
}
