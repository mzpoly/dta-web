<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestquestionhistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('testquestionhistory',function(Blueprint $table){
            $table->integer('testid');
            $table->integer('questionid');
            $table->integer('questionnumber');
            $table->integer('usersanswer')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('testquestinhistory');
    }
}
