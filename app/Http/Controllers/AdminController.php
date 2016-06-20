<?php

namespace App\Http\Controllers;

use App\Repositories\AdminRepository;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests\AdminRequest;

class AdminController extends Controller
{
    public function logInForm()
    {
        return view('login');
    }

    public function tryLogIn(AdminRequest $request,AdminRepository $adminRepository)
    {
        $pwmatch = $adminRepository->checkPassword($request->input('login'),$request->input('password'));
        if($pwmatch==true)
        {
            Auth::login($request->input('login'));
            return view('loggedin');
        }
        else{
            return view('login');
        }
    }
}
