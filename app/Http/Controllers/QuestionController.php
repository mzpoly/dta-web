<?php

namespace App\Http\Controllers;

use App\Repositories\ChoiceRepository;
use App\Repositories\QuestionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class QuestionController extends Controller
{
    public function create()
    {
        return view('questionadmincreate');
    }

    public function questionCreated(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository)
    {
        $question=$questionRepository->add(
            $request->input('questiontype'),
            $request->input('questiontext'),
            $request->input('nbq'),
            '/questionadminimages',
            $request->input('rightanswer'),
            $request->input('testtype'));
        $questionid = $question->id;
        for($i=1;$i<$request->input('nbq')+1;$i++){
            $choiceRepository->add($questionid,$request->input('A'.$i),$i);
        }

        $request->file('imageurl')->move('questionadminimages', 'image-question-'.$questionid);

        return view('questioncreated');
    }

    public function modifyQuestion(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository)
    {
        $questionRepository->modify(
            $request->input('questionid'),
            $request->input('questiontype'),
            $request->input('questiontext'),
            $request->input('nbanswer'),
            $request->input('imageurl'),
            $request->input('rightanswer'),
            $request->input('testtype')
        );

        $questionid = $request->input('questionid');

        Storage::delete(url('questionadminimages/image-question-'.$questionid));
        $request->file('imageurl')->move('questionadminimages', 'image-question-'.$questionid);


         $choiceRepository->clearAnswersOfQuestion($request->input('questionid'));
        
        for ($k =1; $k <= $request->input('nbanswer'); $k++){

            $choiceRepository->add(
                $request->input('questionid'),
                $request->input('A'.$k ),
                $k
            );
        }


        return view('questionmodified');
    }

    public function remove (QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {
        $questionRepository->remove($questionid);
        $choiceRepository->clearAnswersOfQuestion($questionid);
        return view('questionremoved')->with('questionid',$questionid);

    }

    public function getAllQuestions(QuestionRepository $questionRepository)
    {
        $questionlist = $questionRepository->getAllQuestions();
        return view('questionadmin')->with('questionlist',$questionlist);
    }
    
    public function showOneQuestion(QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {

        $question = $questionRepository->getById($questionid);
        $choices = $choiceRepository->getAnswersOfQuestion($questionid);
        return view('questionadminshow')-> with(['question'=> $question, 'choices'=>$choices]);
    }

    public function editOneQuestion(QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {
        $question = $questionRepository->getById($questionid);
        $choice1 = $choiceRepository->getnthAnswer($questionid, 1);
        $choice2 = $choiceRepository->getnthAnswer($questionid, 2);
        $choice3 = $choiceRepository->getnthAnswer($questionid, 3);
        $choice4 = $choiceRepository->getnthAnswer($questionid, 4);
        $choice5 = $choiceRepository->getnthAnswer($questionid, 5);
        return view('questionadminedit')-> with([
            'question' => $question,
            'answer1'=>$choice1,
            'answer2'=>$choice2,
            'answer3'=>$choice3,
            'answer4'=>$choice4,
            'answer5'=>$choice5
        ]);
    }
    
    public function initTest()
    {

    }
    public function nextQuestion(Request $request)
    {

    }
}
