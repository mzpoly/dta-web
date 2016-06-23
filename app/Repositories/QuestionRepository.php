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

    public function add($questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype)
    {
        $question = new $this->question;
        $question->questiontype= $questiontype;
        $question->questiontext = $questiontext;
        $question->nbofchoices=$nbofchoices;
        $question->imageurl = empty($imageurl) ? null : $imageurl;
        $question->rightanswer=$rightanswer;
        $question->testtype = $testtype;
        $question->save();
        return $question;
    }

    public function remove($questionid)
    {
        $question = Question::where('id',$questionid);
        $question->delete();
    }
    public function modify($questionid,$questiontype,$questiontext,$nbofchoices,$imageurl,$rightanswer,$testtype)
    {
        $question =Question::where('id',$questionid) -> firstorfail();
        $question->questiontype= $questiontype;
        $question->questiontext = $questiontext;
        $question->nbofchoices=$nbofchoices;
        $question->imageurl = empty($imageurl) ? null : $imageurl;
        $question->rightanswer=$rightanswer;
        $question->testtype = $testtype;
        $question->save();
    }

    public function getById($questionid)
    {
        $question = Question::where('id',$questionid)->firstorfail();
        return $question;
    }

    public function getAllQuestions()
    {
        return Question::all();
    }

}