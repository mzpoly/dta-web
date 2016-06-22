<?php

namespace App\Http\Controllers;

use App\Repositories\TestUserHRepository;
use Illuminate\Http\Request;

use App\Http\Requests;

class TestUserHController extends Controller
{
    public function showTests(TestUserHRepository $testUserHRepository,Request $request)
    {
        $fblogin = $request->session()->get('fblogin');
        $alldata = $testUserHRepository->getTests($fblogin);
        return view('myscores',['alldata'=> $alldata]);


    }
}
