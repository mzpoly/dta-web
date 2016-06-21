<?php

namespace App\Repositories;

use App\TestQuestionH;

class TestQuestionHRepository implements TestQuestionHRepositoryInterface
{

    protected $test;

    public function __construct(TestHistoryQ $test)
    {
        $this->test = $test;

    }

    public function add($testid,$questionid,$questionnumber,$useranswer)
    {
        $test = new $this->test;
        $test->testid=$testid;
        $test->questionid = $questionid;
        $test->questionnumber=$questionnumber;
        $test->useranswer = $useranswer;
        $test->save();
    }
   

}