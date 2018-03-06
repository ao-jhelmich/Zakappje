<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasRequirement extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_requirement', function (Blueprint $table) {
            $table->increments('user_has_requirement_id');
            $table->integer('user_id');
            $table->integer('requirement_id');
            $table->integer('user_has_requirement_mainrequirement_id');
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
        Schema::dropIfExists('user_has_requirement');
    }
}
