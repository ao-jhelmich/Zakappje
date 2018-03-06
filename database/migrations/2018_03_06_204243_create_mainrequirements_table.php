<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMainrequirementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mainrequirements', function (Blueprint $table) {
            $table->increments('mainrequirements_id');
            $table->string('mainrequirements_name');
            $table->longText('mainrequirements_description');
            $table->integer('mainrequirements_rank_id');
            $table->boolean('flag')->default(1);
            $table->boolean('ModFlag')->default(1);
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
        Schema::dropIfExists('mainrequirements');
    }
}
