<?php

namespace App\Repositories;

interface TestUserHRepositoryInterface
{

    public function add($testtype,$userid,$date,$timespent,$score,$nbtotalquestions);
    public function getQuestions($testid);
    public function getTests($fblogin);
    
}