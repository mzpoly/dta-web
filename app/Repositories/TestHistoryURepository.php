<?php

namespace App\Repositories;

use App\TestHistoryQ;
use App\TestHistoryU;

class TestHistoryURepository implements TestHistoryURepositoryInterface{


    protected $test;

    public function __construct(TestHistoryU $test)
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
        $test= TestHistoryU::where('testid',$testid);
        return TestHistoryQ::where('testid',$testid);
    }
}