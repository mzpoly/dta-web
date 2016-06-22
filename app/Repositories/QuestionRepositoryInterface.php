<?php

namespace App\Repositories;

interface QuestionRepositoryInterface
{

    public function add($questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype);
    public function remove($questionid);
    public function modify($questionid,$questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype);
    public function getAllQuestions();
    public function getRandomQuestion();
    public function getQuestion($questionid);

}