<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', 'HomeController@index');

Route::get('login', 'UsersController@getForm');
Route::post('login/form', 'UsersController@postForm');

Route::get('viewcq', function(){
	return view('create_question');
});

Route::get('newquestion', 'QuestionController@postForm');