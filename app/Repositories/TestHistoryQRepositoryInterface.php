<?php

namespace App\Repositories;

interface TestHistoryQRepositoryInterface
{

    public function add($testid,$questionid,$questionnumber,$useranswer);

}