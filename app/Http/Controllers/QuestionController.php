<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\QuestionRepository;

use App\Http\Requests\QuestionRequest;

class QuestionController extends Controller
{
    public function add(QuestionRequest $request, QuestionRepository $questionRepository)
    {
        $questionRepository->add($request->input('question'));
        return view('question_added');
    }

    public function delete($questionid)
    {
        QuestionRepository::remove($questionid);
        return view('question_deleted');
    }
}
