<?php

namespace App\Repositories;

use App\Choice;

class ChoiceRepository implements  ChoiceRepositoryInterface
{

    protected $choice;

    public function __construct(Choice $choice)
    {
        $this->choice = $choice;

    }

    public function add($questionid, $answer, $choicenumber)
    {
        $choice = new $this->choice;
        $choice->questionid=$questionid;
        $choice->answer = $answer;
        $choice->choicenumber=$choicenumber;
        $choice->save();
    }

    public function remove($questionid, $choicenumber)
    {
        $choice = Choice::where('questionid',$questionid)
           ->where('choicenumber',$choicenumber);
        $choice->delete();
    }

    public function modifyanswer($questionid, $answer, $choicenumber)
    {
        $choice = Choice::where('questionid',$questionid)
            ->where('choicenumber',$choicenumber);
        $choice->answer = $answer;
        $choice->save();
    }

    public function getnthAnswer($questionid, $choicenumber){
        return Choice::where('questionid',$questionid)->where('choicenumber',$choicenumber)->first();
    }
    
    public function getAnswersOfQuestion( $questionid){
        $choice = Choice::where('questionid', $questionid)->get();
        return $choice;
    }

    public function clearAnswersOfQuestion($questionid)
    {
        $choices = Choice::where('questionid',$questionid)->get();

        foreach ($choices  as $choice) {
            $choice->delete();
        }
    }
}