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
            $request->input('question'),
            $request->input('nbq'),
            $request->input('imageurl'),
            $request->input('rightanswer'));
        $questionid = $question->id;
        for($i=1;$i<$request->input('nbq')+1;$i++){
            $choiceRepository->add($questionid,$request->input('A'.$i),$i);
        }

        return view('questioncreated');
    }
}
