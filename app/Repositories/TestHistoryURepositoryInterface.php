<?php

namespace App\Repositories;

interface TestHistoryURepositoryInterface
{

    public function add($testtype,$userid,$date,$timespent,$score);
    public function getQuestions($testid);
    
}