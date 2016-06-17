<?php

namespace App\Http\Controllers;

use App\Repositories\ChoiceRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class ChoiceController extends Controller
{
    public function add(ChoiceRequest $request, ChoiceRepository $choiceRepository)
    {
        $choiceRepository->add($request->input('choice'));
        return view('choice_added');
    }

    public function delete(ChoiceRequest $request, ChoiceRepository $choiceRepository)
    {
        $choiceRepository->remove($request->input('choice'));
        return view('choice_deleted');
    }

    public function modify(ChoiceRequest $request, ChoiceRepository $choiceRepository)
    {
        $choiceRepository->modify($request->input('choice'));
        return view('choice_modified');
    }
}
