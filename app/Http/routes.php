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

Route::get('/passthetest', ['middleware' => 'auth',function() {
    return view('passthetest');
}]);

Route::get('/create_question',['middleware' => 'auth','uses' => 'QuestionController@create']);
Route::post('/create_question',['middleware' => 'auth','uses' => 'QuestionController@questionCreated']);

//AUTH AS FB USER
Route::get('/myscores', ['middleware' => 'auth','uses' => 'TestUserHController@show']);
Route::post('/testquestion',['middleware'=>'auth','uses' => 'QuestionController@initTest']);
Route::post('/testquestion',['middleware'=>'auth','uses' => 'QuestionController@nextQuestion']);

Route::get('/users',['middleware'=>'auth','uses' => 'DriverController@getAllDrivers']);
Route::get('/questionadmin', ['middleware' => 'auth','uses'=>'QuestionController@getAllQuestions']);
Route::get('/loginfb', 'DriverController@nicoLogin');
