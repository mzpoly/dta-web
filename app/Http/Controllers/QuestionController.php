<?php

namespace App\Http\Controllers;

use App\Repositories\ChoiceRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;

use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function create()
    {
        return view('create_question');
    }

    public function questionCreated(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository)
    {
        $question=$questionRepository->add(
            $request->input('questiontype'),
            $request->input('questiontext'),
            $request->input('nbq'),
            $request->input('imageurl'),
            $request->input('rightanswer'),
            $request->input('testtype'));
        $questionid = $question->id;
        for($i=1;$i<$request->input('nbq')+1;$i++){
            $choiceRepository->add($questionid,$request->input('A'.$i),$i);
        }

        return view('questioncreated');
    }

    public function modifyQuestion(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository)
    {
        $questionRepository->modify(
            $request->input('questiontype'),
            $request->input('questiontext'),
            $request->input('nbq'),
            $request->input('imageurl'),
            $request->input('rightanswer'),
            $request->input('testtype'));
        return view('questionmodified');
    }

    public function getAllQuestions(QuestionRepository $questionRepository)
    {
        $questionlist = $questionRepository->getAllQuestions();
        return view('questionadmin')->with('questionlist',$questionlist);
    }
    public function initTest()
    {

    }
    public function nextQuestion(Request $request)
    {

    }
}
