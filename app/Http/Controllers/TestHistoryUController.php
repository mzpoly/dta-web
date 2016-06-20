<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TestHistoryURepository;

use App\Http\Requests\TestHistoryURequest;

class TestHistoryUController extends Controller
{
    public function add(TestHistoryURequest $request,TestHistoryURepository $testHistoryURepository)
    {
        $testHistoryURepository->add($request->input('choice'));
    }

    public function getQuestions($testid){
        return TestHistoryURepository::getQuestions($testid);
    }
}
