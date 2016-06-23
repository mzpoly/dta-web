<?php

namespace App\Repositories;

interface TestQuestionHRepositoryInterface
{

    public function add($testid,$questionid,$questionnumber,$useranswer);

}