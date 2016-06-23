<?php

namespace App\Repositories;

interface QuestionRepositoryInterface
{

    public function add($questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype);
    public function delete($questionid);
    public function modify($questionid,$questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype);
    public function getAllQuestions();
    public function getRandomQuestion();
    public function getQuestion($questionid);
    public function getRightAnswer($questionid);

}