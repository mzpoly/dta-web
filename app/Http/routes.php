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

Route::auth();

Route::get('/home', 'HomeController@index');

Route::get('/aboutthetest', function() {
    return view('aboutthetest');
});

Route::get('/passthetest', function() {
    if(session('loggedIn')==true){return view('passthetest');}
    else{return view('aboutthetest');}

});

Route::get('/questionadmin.create',['middleware' => 'auth','uses' => 'QuestionController@create']);
Route::post('/questionadmin.create',['middleware' => 'auth','uses' => 'QuestionController@questionCreated']);
Route::post('/modify_question',['middleware' => 'auth','uses' => 'QuestionController@modifyQuestion']);

//AUTH AS FB USER
Route::get('/myscores', ['middleware' => 'auth','uses' => 'TestUserHController@show']);
Route::post('/testquestion',['middleware'=>'auth','uses' => 'QuestionController@initTest']);
Route::post('/testquestion',['middleware'=>'auth','uses' => 'QuestionController@nextQuestion']);

Route::get('/users',['middleware'=>'auth','uses' => 'DriverController@getAllDrivers']);

//question administrator part
Route::get('/questionadmin', ['middleware' => 'auth','uses'=>'QuestionController@getAllQuestions']);
Route::get('/questionadmin.show/{questionid}', ['middleware' => 'auth','uses'=>'QuestionController@showOneQuestion']);
Route::get('/questionadmin.edit/{questionid}', ['middleware' => 'auth','uses'=>'QuestionController@editOneQuestion']);
Route::get('/questionadmin.delete/{questionid}', ['middleware' => 'auth','uses'=>'QuestionController@remove']);


Route::get('/loginfb', 'DriverController@nicoLogin');
Route::get('/logoutfb', 'DriverController@fbLogout');

//uploading file
Route::get('/questionadminimages', function (){
    return view('questionadminimages');
});
