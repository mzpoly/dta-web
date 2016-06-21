<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions',function(Blueprint $table){
            $table->increments('id');
            $table->string('questiontype',64);
            $table->text('questiontext');
            $table->integer('nbofchoices');
            $table->string('imageurl',64)->nullable();
            $table->integer('rightanswer');
            $table->string('testtype');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('questions');
    }
}
