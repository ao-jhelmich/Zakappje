<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_rank_id')->default(0);
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->integer('accountRole')->default(0);
            $table->string('lastName')->nullable();            
            $table->string('streetAdress')->nullable();            
            $table->integer('houseNumber')->nullable();            
            $table->string('city')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('user_phone_number')->nullable();            
            $table->integer('birth_day_year')->nullable();            
            $table->integer('birth_day_month')->nullable();            
            $table->integer('birth_day_day')->nullable();            
            $table->string('user_parent_name')->nullable();
            $table->string('user_parent_email')->nullable();
            $table->string('user_parent_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
