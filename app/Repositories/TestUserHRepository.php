<?php

namespace App\Repositories;

use App\TestUserH;
use App\TestQuestionH;

class TestUserHRepository implements TestUserHRepositoryInterface{


    protected $test;

    public function __construct(TestUserH $test)
    {
        $this->test = $test;

    }
    public function add($testtype,$userid,$date,$timespent,$score)
    {
        $test = new $this->test;
        $test->testtype=$testtype;
        $test->userid = $userid;
        $test->date=$date;
        $test->timespent = $timespent;
        $test->score = $score;
        $test->save();
    }
    public function getQuestions($testid)
    {
        $test= TestUserH::where('testid',$testid);
        return TestQuestionH::where('testid',$testid);
    }
}