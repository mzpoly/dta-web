<?php

namespace App\Http\Controllers;

use App\Repositories\QuestionRepository;
use App\Repositories\TestUserHRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Http\Requests;

class TestUserHController extends Controller
{
    public function showTests(TestUserHRepository $testUserHRepository,Request $request)
    {
        $fblogin = $request->session()->get('fblogin');
        $alldata = $testUserHRepository->getTests($fblogin);
        return view('myscores',['alldata'=> $alldata]);


    }

    public function viewTest(Request $request,TestUserHRepository $testUserHRepository, QuestionRepository $questionRepository)
    {
        $testnb=Input::get('testnumber');

        if($testUserHRepository->checkTest($testnb,$request->session()->get('fblogin')))
        {
            $test=$testUserHRepository->getTest($testnb);
            $testq=$testUserHRepository->getQuestions($testnb);
            foreach($testq as $q){
                $ua[$q->questionnumber]=$q->useranswer;
                $questionlist[$q->questionnumber]=$q->questionid;
                $ra[$q->questionnumber]=$questionRepository->getRightAnswer($q->questionid);
            }
            return view('testscore')
                ->with('nbquestions',$test->nbtotalquestions)
                ->with('rightanswerlist',$ra)
                ->with('useranswerlist',$ua)
                ->with('questionlist',$questionlist)
                ->with('score',$test->score);
        }
        else
        {
            $this->showTests($testUserHRepository, $request);
        }
        

    }
}
