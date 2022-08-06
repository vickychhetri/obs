<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLockunlockmodulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lockunlockmodules', function (Blueprint $table) {
            $table->id('LockID');
            $table->string('ContentType',2);
            $table->bigInteger('ContentID')->unsigned();
            $table->string('unLock',2);
            $table->bigInteger('UserID')->unsigned();
            $table->timestamps();
        });
        Schema::table('lockunlockmodules', function($table) {
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
        Schema::dropIfExists('lockunlockmodules');
    }
}
