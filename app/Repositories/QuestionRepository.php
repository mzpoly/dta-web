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
        $question =Question::where('id',$questionid);
        $question->questiontype= $questiontype;
        $question->questiontext = $questiontext;
        $question->nbofchoices=$nbofchoices;
        $question->imageurl = empty($imageurl) ? null : $imageurl;
        $question->rightanswer=$rightanswer;
        $question->testtype = $testtype;
        $question->save();
    }

    public function getAllQuestions()
    {
        return Question::all();
    }

    public function getRandomQuestion() // return question, it's id and total rows
    {
        $totalRows = Question::all()->count();
        $questionid = rand(1,$totalRows);
        return [Question::where('id','>=',$questionid)->firstorfail(),$questionid,$totalRows];
    }

    public function getQuestion($questionid)
    {
        return Question::where('id',$questionid)->firstorfail();
    }
    public function getRightAnswer($questionid)
    {
        return Question::where('id',$questionid)->firstorfail()->rightanswer;
    }

}