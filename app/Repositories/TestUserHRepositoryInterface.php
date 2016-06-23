<?php

namespace App\Repositories;

interface TestUserHRepositoryInterface
{

    public function add($testtype,$userid,$date,$timespent,$score);
    public function getQuestions($testid);
    public function getTests($userid);
    
}