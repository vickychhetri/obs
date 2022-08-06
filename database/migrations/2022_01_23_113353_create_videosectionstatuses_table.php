<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVideosectionstatusesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videosectionstatuses', function (Blueprint $table) {
            $table->id();
            $table->string('ContentType',2);
            $table->bigInteger('ContentID')->unsigned();
            $table->string('unLock',2);
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
        Schema::dropIfExists('videosectionstatuses');
    }
}
