<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\DriverRepository;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DriverController extends Controller
{
    public function getAllDrivers(DriverRepository $driverRepository)
    {
        $userlist=$driverRepository->getAllDrivers();
        return view('users')->with('userlist',$userlist);
    }

    public function nicoLogin(Request $request)
    {
        Auth::logout();
        $request->session()->put('loggedIn',true);
        $request->session()->put('fblogin','nico.donati');
        return view('welcome');
    }

    public function fbLogout(Request $request)
    {
        $request->session()->forget('loggedIn');
        $request->session()->forget('fblogin');
    }
}
