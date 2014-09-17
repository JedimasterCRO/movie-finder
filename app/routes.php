<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showWelcome'));
Route::get('register', array('as' => 'register', 'uses' => 'HomeController@getRegister'));
Route::get('registered', array('uses' => 'HomeController@registered'));
Route::get('login', array('uses' => 'HomeController@getLogin'));
Route::get('ranking', array('as' => 'ranking', 'uses' => 'HomeController@ranking'));
Route::get('logout', array('uses' => 'HomeController@logout'));
Route::get('insert_movie', array('as' => 'insert', 'uses' => 'HomeController@getInsertMovie'));
Route::get('my_movies', array('uses' => 'HomeController@myMovies'));

Route::post('register', array('before' => 'csrf', 'uses' => 'HomeController@postRegister'));
Route::post('login', array('uses' => 'HomeController@postLogin'));
Route::post('insert_movie', array('uses' => 'HomeController@postInsertMovie'));


