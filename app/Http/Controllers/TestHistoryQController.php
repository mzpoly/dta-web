<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\TestHistoryQRepository;

use App\Http\Requests;

class TestHistoryQController extends Controller
{
    public function add(TestHistoryQRequest $request,TestHistoryQRepository $testHistoryQRepository)
    {
        $testHistoryQRepository->add($request->input('choice'));
    }
}
