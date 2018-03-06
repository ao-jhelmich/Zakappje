<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWantChecked extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_want_checked', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('requirement_id');
            $table->string('user_name');
            $table->string('requirement_name');
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
        Schema::dropIfExists('user_want_checked');
    }
}
