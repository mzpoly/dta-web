<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestuserhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testuserhistory',function(Blueprint $table){
            $table->increments('testid');
            $table->string('testtype');
            $table->integer('userid');
            $table->date('date');
            $table->integer('timespent');
            $table->integer('score');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('testuserhistory');
    }
}
