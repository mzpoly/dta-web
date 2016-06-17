<?php

namespace App\Repositories;

use App\Question;

class QuestionRepository implements  QuestionRepositoryInterface
{

    protected $question;

    public function __construct(Question $question)
    {
        $this->question = $question;

    }

    public function add($questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer)
    {
        $question = new $this->question;
        $question->questiontype=questiontype;
        $question->questiontext = $questiontext;
        $question->nbofchoices=$nbofchoices;
        $question->imageurl = empty($imageurl) ? null : $imageurl;
        $question->rightanswer=$rightanswer;
        $question->save();
    }

    public function remove($questionid)
    {
        $question = question::where('questionid',$questionid);
        $question->delete();
    }

   
}