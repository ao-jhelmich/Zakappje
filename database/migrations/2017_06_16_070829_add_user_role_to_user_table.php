<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddUserRoleToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->integer('accountRole');
            $table->char('lastName', 55);
            $table->char('streetAdress', 255);
            $table->char('city', 255);
            $table->bigInteger('postal_code');
            $table->bigInteger('user_phone_umber');
            $table->integer('birth_day_year');
            $table->integer('birth_day_month');
            $table->integer('birth_day_day');
            $table->char('user_parent_name', 255);
            $table->string('user_parent_email', 255);
            $table->integer('user_parent_phone');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user', function (Blueprint $table) {
            //
        });
    }
}
