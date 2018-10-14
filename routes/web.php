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

Auth::routes();

Route::group(['middleware'=>'auth'],function(){
	Route::get('/home', 'HomeController@index');
	Route::get('/chat/{id}', 'ChatController@show');
	Route::get('/chat/getChat/{id}', 'ChatController@getChat');
	Route::post('/chat/postChat', 'ChatController@postChat');
});
