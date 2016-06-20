<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\UsersRequest;

class UsersController extends Controller
{
    /*
    public function index()
    {
    	return view('index');
    }
    */

    public function getForm()
    {
    	return view('login');
    }

    public function postForm(UsersRequest $request)
    {
    	/*$user = new Users;
    	$user->users = $request->input('login');
    	$user->users = $request->input('email');
    	$user->save();

    	return view('users_ok');*/
    	//$str = $request->('login'));
    	//return view('confirmation')->withLogin( &str ); 
    	return view('confirmation');
    }
}
