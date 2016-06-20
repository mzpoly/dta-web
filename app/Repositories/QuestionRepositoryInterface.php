<?php

namespace App\Repositories;

interface QuestionRepositoryInterface
{

    public function add($questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer);
    public function remove($questionid);

}