<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            //user id will be added in the connect migration
            //$table->integer('user_id');
            $table->char('gender',1);
            $table->date('goal_start_dt')->nullable();
            $table->date('goal_end_dt')->nullable();
            $table->integer('goal_cur_min')->nullable();
            $table->integer('goal_cur_sec')->nullable();
            $table->integer('goal_trgt_min')->nullable();
            $table->integer('goal_trgt_sec')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
