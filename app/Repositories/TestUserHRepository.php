<?php

namespace App\Repositories;

use App\Driver;
use App\TestUserH;
use App\TestQuestionH;

class TestUserHRepository implements TestUserHRepositoryInterface{


    protected $test;

    public function __construct(TestUserH $test)
    {
        $this->test = $test;

    }
    public function add($testtype,$userid,$date,$timespent,$score,$nbtotalquestions)
    {
        $test = new $this->test;
        $test->testtype=$testtype;
        $test->userid = $userid;
        $test->date=$date;
        $test->timespent = $timespent;
        $test->score = $score;
        $test->nbtotalquestions = $nbtotalquestions;
        $test->save();
        return $test->id;
    }
    public function getQuestions($testid)
    {

        return TestQuestionH::where('testid',$testid)->get();
    }

    public function getTests($fblogin)
    {
        $driver= Driver::where('fblogin',$fblogin)->firstorfail();
        $userid = $driver->id;
        return TestUserH::where('userid',$userid)->orderBy('testid', 'desc')->get();
    }
    public function checkTest($testid,$fblogin)
    {
        $useridt=TestUserH::where('testid',$testid)->firstorfail()->userid;
        var_dump($useridt);
        $useridfb=Driver::where('fblogin',$fblogin)->firstorfail()->id;
        return $useridt==$useridfb;
    }
    public function getTest($testid)
    {
        return TestUserH::where('testid',$testid)->firstorfail();
    }
}