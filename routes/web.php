<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {	
    return view('welcome');
});

Route::get('/hello', function(){
	return 'Hello, World.';
});


Route::get('/user/{id}', function($id){
	return 'Hi, User '. $id;
});

Route::get('/start', function(){
	return view('start');
});
Route::get('/require', function(){
	return view('requirement');
});
Route::post('/require', 'PostController@checkList');
#Route::post('/require', 'PostController@store');


Route::get('/finish', function(){
	return view('finish');
});

Route::get('/posts', 'PostController@index');

Route::get('/posts/{id}', 'PostController@show');

#Route::post('/posts', 'PostController@store');


