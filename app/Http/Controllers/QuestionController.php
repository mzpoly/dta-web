<?php

namespace App\Http\Controllers;

use App\Repositories\ChoiceRepository;
use App\Repositories\QuestionRepository;
use App\Repositories\TestQuestionHRepository;
use App\Repositories\TestUserHRepository;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Storage;

class QuestionController extends Controller
{
    public function create()
    {
        return view('questionadmincreate');
    }


    ///// ADMIN FUNCTIONS
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
            '/questionadminimages',
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

    public function getAllQuestions(QuestionRepository $questionRepository)
    {
        $questionlist = $questionRepository->getAllQuestions();
        return view('questionadmin')->with('questionlist',$questionlist);
    }

    public function showOneQuestion(QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {
        $question = $questionRepository->getQuestion($questionid);
        $choices = $choiceRepository->getAnswersOfQuestion($questionid);
        return view('questionadminshow')-> with(['question'=> $question, 'choices'=>$choices]);
    }

    public function editOneQuestion(QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {
        $question = $questionRepository->getQuestion($questionid);
        $choice1 = $choiceRepository->getChoice($questionid, 1);
        $choice2 = $choiceRepository->getChoice($questionid, 2);
        $choice3 = $choiceRepository->getChoice($questionid, 3);
        $choice4 = $choiceRepository->getChoice($questionid, 4);
        $choice5 = $choiceRepository->getChoice($questionid, 5);
        return view('questionadminedit')-> with([
            'question' => $question,
            'answer1'=>$choice1,
            'answer2'=>$choice2,
            'answer3'=>$choice3,
            'answer4'=>$choice4,
            'answer5'=>$choice5
        ]);
    }

    public function remove (QuestionRepository $questionRepository, ChoiceRepository $choiceRepository, $questionid)
    {
        $questionRepository->delete($questionid);
        $choiceRepository->clearAnswersOfQuestion($questionid);
        Storage::delete(url('questionadminimages/image-question-'.$questionid));
        return view('questionremoved')->with('questionid',$questionid);
    }

    //////TEST FUNCTIONS
    public function initTest(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository)
    {

        $totalRows= $questionRepository->getMaxId();// question, id, maxid
        $question=NULL;
        $request->session()->put('totalquestions',$totalRows);
        $request-> session() -> put('testtype',$request->input('testtype'));
        $key = $totalRows;

        while(gmp_gcd($key,$totalRows)!=1){
            $key = rand(1,$totalRows);
        }
        $request -> session() -> put('key',$key);
        $questionid = rand(1,$totalRows);
        while($question==NULL||$question->testtype!=$request->session()->get('testtype')) {
            $question = $questionRepository->getQuestion($questionid);
            $questionid+=$key;
            if($questionid>$request->session()->get('totalquestions')){$questionid -= $request->session()->get('totalquestions');}

        }
        $nextquestion=$questionid+$key;
        if($nextquestion>$request->session()->get('totalquestions')){$nextquestion -= $request->session()->get('totalquestions');}
        $nba=$question->nbofchoices;
        $questiontext = $question->questiontext;
        for($i=1;$i<$nba+1;$i++){$answer[$i]=$choiceRepository->getChoice($question->id,$i)->answer;}
        $request -> session() -> put('questions',[1=>$question->id]);
        $request -> session() -> put('rightanswer',[1=>$question->rightanswer]);
        $request -> session() -> put('useranswer',[]);
        $request -> session() -> put('nbquestions',10);
        return view('testquestion')
            ->with('questionnb',1)
            ->with('answer',$answer)
            ->with('question',$questiontext)
            ->with('nba',$nba)
            ->with('nextquestion',$nextquestion)
            ->with('questiontype',$question->questiontype);
    }
    public function nextQuestion(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository,TestUserHRepository $testUserHRepository,TestQuestionHRepository $testQuestionHRepository)
    {
        if($request->input('nextquestionnb')>$request -> session() -> get('nbquestions')){
            $useranswer = $request -> session() ->get('useranswer');
            $useranswer[$request->input('nextquestionnb')-1] = $request->input('answer');
            $request -> session() ->put('useranswer',$useranswer);
            return $this->testScorePage($request,$questionRepository,$choiceRepository,$testUserHRepository,$testQuestionHRepository);
        }
        $questionid = $request->input('nextquestion');
        $question=NULL;
        $key= $request->session()->get("key");
        while($question==NULL||$question->testtype!=$request->session()->get('testtype')) {
            $question = $questionRepository->getQuestion($questionid);
            $questionid+=$key;
            if($questionid>$request->session()->get('totalquestions')){$questionid -= $request->session()->get('totalquestions');}

        }
        $nba=$question->nbofchoices;
        $questiontext = $question->questiontext;
        for($i=1;$i<$nba+1;$i++){$answer[$i]=$choiceRepository->getChoice($question->id,$i)->answer;}

        $nextquestion=$questionid;
        $questionid-=$key;
        if($questionid<1){$questionid+=$request->session()->get('totalquestions');}
        if($nextquestion>$request->session()->get('totalquestions')){$nextquestion -= $request->session()->get('totalquestions');}

        $rightanswer = $request -> session() ->get('rightanswer');
        $rightanswer[$request->input('nextquestionnb')] = $question->rightanswer;
        $request -> session() ->put('rightanswer',$rightanswer);

        $questionsession = $request -> session() ->get('questions');
        $questionsession[$request->input('nextquestionnb')] = $questionid;
        $request -> session() ->put('questions',$questionsession);


        $useranswer = $request -> session() ->get('useranswer');
        $useranswer[$request->input('nextquestionnb')-1] = $request->input('answer');
        $request -> session() ->put('useranswer',$useranswer);
        return view('testquestion')
            ->with('questionnb',$request->input('nextquestionnb'))
            ->with('answer',$answer)
            ->with('question',$questiontext)
            ->with('nba',$nba)
            ->with('nextquestion',$nextquestion)
            ->with('questiontype',$question->questiontype);
    }

    public function testScorePage(Request $request,QuestionRepository $questionRepository,ChoiceRepository $choiceRepository,TestUserHRepository $testUserHRepository,TestQuestionHRepository $testQuestionHRepository  ){
        $q=$request -> session() -> get('questions');
        $ra=$request -> session() -> get('rightanswer');
        $ua=$request -> session() -> get('useranswer');
        $nbquestions = $request->session()->get('nbquestions');
        $score=0;
        for($i=1;$i<$request -> session() -> get('nbquestions')+1;$i++){
            if($ra[$i]==$ua[$i]){
                $score++;
            }
        }

        $timespent = abs((new DateTime())->getTimeStamp()-DateTime::createFromFormat('D, d M Y H:i:s e' ,$_COOKIE['myClock'])->getTimestamp());

        $testid=$testUserHRepository->add($request->session()->get('testtype'),1,new DateTime(),$timespent,$score,$request -> session() -> get('nbquestions'));
        for($i=1;$i<$request -> session() -> get('nbquestions')+1;$i++){
            $testQuestionHRepository->add($testid,$q[$i],$i,$ua[$i]);
            $question=$questionRepository->getQuestion($q[$i]);
            $questiontext[$i] = $question->questiontext;
            $nba[$i] = $question->nbofchoices;
            for($j=1;$j<$question->nbofchoices+1;$j++){
                $choice=$choiceRepository->getChoice($q[$i],$j);
                $answerlist[$i][$j]=$choice->answer;
            }

        }


        return view('testscore')
            ->with('questiontext',$questiontext)
            ->with('answerlist',$answerlist)
            ->with('nba',$nba)
            ->with('rightanswerlist',$ra)
            ->with('useranswerlist',$ua)
            ->with('score',$score)
            ->with('nbquestions',$nbquestions)
            ->with('timespent',$timespent);
    }





}
