<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoginusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loginusers', function (Blueprint $table) {
            $table->id('UserID');
            $table->string('name');
            $table->string('email');
            $table->string('mobile');
            $table->string('profilePhoto')->dafault('userProfile.png');
            $table->integer('approved')->dafault('0');
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
        Schema::dropIfExists('loginusers');
    }
}
