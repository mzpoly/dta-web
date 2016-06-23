<?php

namespace App\Http\Controllers;

use App\Repositories\TestUserHRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestUserHController extends Controller
{
    public function show(TestUserHRepository $testUserHRepository){
        $userid=Auth::user();
        $alldata=$testUserHRepository->getTests($userid);
        return view('myscores')->with('alldata',$alldata);

    }
}
